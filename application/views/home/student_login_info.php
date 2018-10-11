<html>
    <body>
         <span>Hello ,</span>
         <br><br>
         
                            <p>Dear center following students are not login yet...</p>
                            <br><br>
                            <table>
                            <tr><th>Student Id</th><th> Student Name</th></tr>
                            <?php 
                          
                                                     foreach ($stud_data as $stud)
                                                     {
                                                         echo '<tr><td>'.$stud->student_id.'</td>';
                                                         echo '<td>'.$stud->student_fname." ".$stud->student_lname;'</td></tr>';
                                                     }
                            ?>
                            </table>
    </body>
</html>