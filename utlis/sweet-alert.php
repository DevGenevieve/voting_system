<?php

// Check for success message
if (isset($_SESSION['success'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                text: '{$_SESSION['success']}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#FFA500',
                color: '#000',
                background: '#fff',
              
            });
        });
    </script>";
    unset($_SESSION['success']); // Clear message after displaying
}

// Check for error message
if (isset($_SESSION['error'])) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                text: '{$_SESSION['error']}',
                confirmButtonText: 'OK',
                confirmButtonColor: 'blue',
                
                
                background: '#fff',
                color: '#000',
                
            });
        });
    </script>";
    unset($_SESSION['error']); // Clear message after displaying
}

?>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>