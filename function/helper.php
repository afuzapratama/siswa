<?php

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Ramsey\Uuid\Uuid;


function uploadFile(array $file, string $strip , string $username): ?string
{
    // Check if required environment variables are set
    if (!isset($_ENV['AWS_ENDPOINT'], $_ENV['AWS_REGION'], $_ENV['AWS_ACCESS_KEY_ID'], $_ENV['AWS_SECRET_ACCESS_KEY'], $_ENV['AWS_BUCKET'])) {
        throw new Exception('AWS environment variables are not properly configured.');
    }

    $myuuid = Uuid::uuid4();
    $key = $strip . '/' . $username.'-'.$myuuid->toString(); // Modified key format

    $profil_credentials = getAwsClientConfiguration();

    try {
        $s3 = new S3Client($profil_credentials);
        $result = $s3->putObject([
            'Bucket' => $_ENV['AWS_BUCKET'],
            'Key' => $key,
            'SourceFile' => $file['tmp_name'],
            'ACL' => 'public-read',
        ]);

        return $result['ObjectURL'];
    } catch (AwsException $e) {
        // Log the error or handle it accordingly.
        // You might consider returning null instead of the raw error message for security reasons.
        return null;
    }
}

function deleteFile(string $key): bool
{
    // Check if required environment variables are set
    if (!isset($_ENV['AWS_ENDPOINT'], $_ENV['AWS_REGION'], $_ENV['AWS_ACCESS_KEY_ID'], $_ENV['AWS_SECRET_ACCESS_KEY'], $_ENV['AWS_BUCKET'])) {
        throw new Exception('AWS environment variables are not properly configured.');
    }

    $profil_credentials = getAwsClientConfiguration();

    try {
        $s3 = new S3Client($profil_credentials);
        $result = $s3->deleteObject([
            'Bucket' => $_ENV['AWS_BUCKET'],
            'Key' => $key,
        ]);

        return $result['DeleteMarker'] ?? false;
    } catch (AwsException $e) {
        // Log the error or handle it accordingly.
        // Returning false might be more secure than exposing raw error messages.
        return false;
    }
}

function getAwsClientConfiguration(): array
{
    return [
        'endpoint' => $_ENV['AWS_ENDPOINT'],
        'region' => $_ENV['AWS_REGION'],
        'version' => 'latest',
        'use_path_style_endpoint' => true,
        'credentials' => [
            'key' => $_ENV['AWS_ACCESS_KEY_ID'],
            'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
        ],
        'http' => [
            'verify' => false,
        ],
    ];
}