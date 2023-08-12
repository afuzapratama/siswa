<?php
include '../layout/header.php';
?>
<div class="container">
    <div class="col-lg-12 mt-4">
        <div class="row">
            <div class="col-6 mb-3">
                <div class="card">

                    <div class="card-header bg-success">
                        <h5 class="text-center text-light fw-bold home-info">Nilai</h5>
                    </div>
                    <div class="card-body">
                        <div class="img-backgroud-1">
                            <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#198754" transform="rotate(270)matrix(1, 0, 0, 1, 0, 0)">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style type="text/css">
                                        .linesandangles_een {
                                            fill: #198754;
                                        }
                                    </style>
                                    <path class="linesandangles_een" d="M23,3l-7,5L4.031,19.875l1,1L3,25l1,1l-2,2l3,1l1-1l1,1l4-2l1,1l12-12l5-7L23,3z M16.704,10.118 l5.174,5.174l-9.586,9.586l-5.212-5.212L16.704,10.118z M5.427,24.599l1.24-2.518L9.9,25.314l-2.505,1.253L5.427,24.599z M23.155,13.741l-4.897-4.897l4.525-3.232l3.604,3.604L23.155,13.741z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-center mb-3 fw-bold fs-2">150</div>
                        <p class="text-center">Total Nilai</p>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h5 class="text-center text-light fw-bold home-info">Tugas Baru</h5>
                    </div>
                    <div class="card-body">
                        <div class="img-backgroud-1">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#DC3545">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M5 19V6.2C5 5.0799 5 4.51984 5.21799 4.09202C5.40973 3.71569 5.71569 3.40973 6.09202 3.21799C6.51984 3 7.0799 3 8.2 3H15.8C16.9201 3 17.4802 3 17.908 3.21799C18.2843 3.40973 18.5903 3.71569 18.782 4.09202C19 4.51984 19 5.0799 19 6.2V17H7C5.89543 17 5 17.8954 5 19ZM5 19C5 20.1046 5.89543 21 7 21H19M18 17V21M10 6V10M14 10V14M8 8H12M12 12H16" stroke="#DC3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-center mb-3 fw-bold fs-2">2</div>
                        <p class="text-center">Tugas</p>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-center text-light fw-bold home-info">Tugas Selesai</h5>
                    </div>
                    <div class="card-body">
                        <div class="img-backgroud-1">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M4 19V6.2C4 5.0799 4 4.51984 4.21799 4.09202C4.40973 3.71569 4.71569 3.40973 5.09202 3.21799C5.51984 3 6.0799 3 7.2 3H16.8C17.9201 3 18.4802 3 18.908 3.21799C19.2843 3.40973 19.5903 3.71569 19.782 4.09202C20 4.51984 20 5.0799 20 6.2V17H6C4.89543 17 4 17.8954 4 19ZM4 19C4 20.1046 4.89543 21 6 21H20M9 7H15M9 11H15M19 17V21" stroke="#0D6EFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-center mb-3 fw-bold fs-2">2</div>
                        <p class="text-center">Tugas</p>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h5 class="text-center text-light fw-bold home-info">Tugas Terlewat</h5>
                    </div>
                    <div class="card-body">
                        <div class="img-backgroud-1">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M12 10.4V20M12 10.4C12 8.15979 12 7.03969 11.564 6.18404C11.1805 5.43139 10.5686 4.81947 9.81596 4.43597C8.96031 4 7.84021 4 5.6 4H4.6C4.03995 4 3.75992 4 3.54601 4.10899C3.35785 4.20487 3.20487 4.35785 3.10899 4.54601C3 4.75992 3 5.03995 3 5.6V16.4C3 16.9601 3 17.2401 3.10899 17.454C3.20487 17.6422 3.35785 17.7951 3.54601 17.891C3.75992 18 4.03995 18 4.6 18H7.54668C8.08687 18 8.35696 18 8.61814 18.0466C8.84995 18.0879 9.0761 18.1563 9.29191 18.2506C9.53504 18.3567 9.75977 18.5065 10.2092 18.8062L12 20M12 10.4C12 8.15979 12 7.03969 12.436 6.18404C12.8195 5.43139 13.4314 4.81947 14.184 4.43597C15.0397 4 16.1598 4 18.4 4H19.4C19.9601 4 20.2401 4 20.454 4.10899C20.6422 4.20487 20.7951 4.35785 20.891 4.54601C21 4.75992 21 5.03995 21 5.6V16.4C21 16.9601 21 17.2401 20.891 17.454C20.7951 17.6422 20.6422 17.7951 20.454 17.891C20.2401 18 19.9601 18 19.4 18H16.4533C15.9131 18 15.643 18 15.3819 18.0466C15.15 18.0879 14.9239 18.1563 14.7081 18.2506C14.465 18.3567 14.2402 18.5065 13.7908 18.8062L12 20" stroke="#FFC107" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text-center mb-3 fw-bold fs-2">2</div>
                        <p class="text-center">Tugas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 mb-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center text-dark fw-bold home-info"> <i data-feather="alert-triangle"></i>
                            Jadwal
                            Ulangan
                            Atau Kuis</h5>
                    </div>
                    <div class="card-body mx-auto">
                        <table class="table table-borderless table-home">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>12/12/2021</td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>:</td>
                                <td>12:00</td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>Ulangan Harian</td>
                            </tr>
                            <tr>
                                <td>Materi</td>
                                <td>:</td>
                                <td>Praktek</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../layout/footer.php';
?>