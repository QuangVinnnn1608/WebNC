<?php
// Include file config.php
                    require_once "ket_noi.php";
                    
                    // Cố gắng thực thi truy vấn
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Họ và tên</th>";
                                        echo "<th>Địa chỉ</th>";
                                        echo "<th>Lương</th>";
                                        echo "<th>Chức năng</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='infoform.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='sua-form.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='xoa-form.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Giải phóng bộ nhớ
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Không tìm thấy bản ghi.</em></p>";
                        }
                    } else{
                        echo "ERROR: Không thể thực thi $sql. " . mysqli_error($link);
                    }
 
                    // Đóng kết nối
                    mysqli_close($link);
?>