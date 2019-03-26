<?php

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'persuratan':
            if(isset($_GET['mode'])){
                switch ($_GET['mode']) {
                    case 'add':
                        include 'app/views/v_persuratan_add.php';
                        break;
                    
                    case 'edit':
                        include 'app/views/v_persuratan_edit.php';
                        break;
                    
                    case 'detail':
                        include 'app/views/v_persuratan_detail.php';
                        break;
                    
                    case 'data-terusan':
                        include 'app/views/v_terusan.php';
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            else{
                include 'app/views/v_persuratan.php';
            }
            break;
        case 'manajemenPengguna':
                if(isset($_GET['mode'])){
                    switch ($_GET['mode']) {
                        case 'add':
                            include 'app/views/v_manajemenPengguna_add.php';
                            break;
                        
                        case 'edit':
                            include 'app/views/v_manajemenPengguna_edit.php';
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }
                else{
                    include 'app/views/v_manajemenPengguna.php';
                }
            break;
        default:
            # code...
            break;
    }
}
else{
    include 'app/views/v_dashboard.php';
}