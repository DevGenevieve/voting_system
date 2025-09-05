<?php
session_start();
    if(!isset( $_SESSION['userId'])){
        $redirectUrl = '../index.php';
          
        echo "
    <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                let timeLeft = 3;
                let timerInterval;

                Swal.fire({
                    title: 'Unauthorized Access',
                    html: You will be redirected to the login page in <b>3</b> seconds.,
                    icon: 'warning',
                    background: '#f0f0f0',
                    timer: timeLeft * 1000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    didOpen: () => {
                        const content = Swal.getHtmlContainer().querySelector('b');
                        timerInterval = setInterval(() => {
                            timeLeft--;
                            content.textContent = timeLeft;
                        }, 1000);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then(() => {
                    window.location.href = '$redirectUrl';
                });

                setTimeout(() => {
                    window.location.href = '$redirectUrl';
                }, timeLeft * 1000);
            </script>
        </body>
    </html>";
    exit();
    }
?>


