<!-- Heading -->
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-10">
            <div class="alert alert-success text-center mt-5" role="alert">
                <?php echo $template_name; ?>
            </div>
        </div>
    </div>
</div><!-- Heading -->

<?php
   
    // Getting Result
    $req_data = $conn->prepare("SELECT * FROM `becomedonor` WHERE id = '$id'");
    $req_data->execute();
    $result = $req_data->get_result();
    if($result->num_rows === 0) exit('Request Not Founded.');
    while($row = $result->fetch_assoc()) {       
?> 
<form method="POST" action="edit-details-process.php">
    <input name="do" type="hidden" value="donor">
    <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
    <!-- showing result with bootstrap -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center" scope="col-12" ><br>
                                <span class="px-3 py-2 border border-light bg-danger"><?php echo $row['bloodGroup']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">ID :</th>
                            <td class="text-left" scope="col"><?php echo $row['id']; ?></td>
                        </tr>
                        <tr>
                            <th scope="col">Name :</th>
                            <td class="text-left" scope="col">
                                <input name="name" type="text" value="<?php echo $row['name']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Gender :</th>
                            <td class="text-left" scope="col">
                                <select name="gender" class="form-control">
                                    <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Blood Group :</th>
                            <td class="text-left" scope="col">
                                <select name="bloodGroup" class="form-control">
                                    <option value="<?php echo $row['bloodGroup']; ?>"><?php echo $row['bloodGroup']; ?></option>
                                    <option value="A(+)">A(+)</option>
                                    <option value="A(-)">A(-)</option>
                                    <option value="AB(+)">AB(+)</option>
                                    <option value="AB(-)">AB(-)</option>
                                    <option value="B(+)">B(+)</option>
                                    <option value="B(-)">B(-)</option>
                                    <option value="O(+)">O(+)</option>
                                    <option value="O(-)">O(-)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Mobile Number :</th>
                            <td class="text-left" scope="col">
                                <input name="mobile" type="text" value="<?php echo $row['mobile']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">E-amil :</th>
                            <td class="text-left" scope="col">
                                <input name="email" type="email" value="<?php echo $row['email']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Date of Birth & Age :</th>
                            <td class="text-left" scope="col">
                                <input name="dob" type="date" value="<?php echo $row['dob']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Address :</th>
                            <td class="text-left" scope="col">
                                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Full Address"><?php echo $row['address']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Social Url :</th>
                            <td class="text-left" scope="col">
                                <input name="socialUrl" type="text" value="<?php echo $row['socialUrl']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Password :</th>
                            <td class="text-left" scope="col">
                            <input name="password1" type="password" class="form-control" id="inputPassword2" placeholder="Password">
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Re-type Password :</th>
                            <td class="text-left" scope="col">
                            <input name="password2" type="password" class="form-control" id="inputPassword2" placeholder="Re-type Password">                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Action</th>
                            <td class="text-left" scope="col"><a class="btn btn-danger py-1 px-2" href="edit-details.php?action=deleteDonor&id=<?php echo $row['id']; ?>">Delete Donor</a></td> 
                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
    <?php   
        } // while for fetch row assoc
        $req_data->close(); // Getting Data
        $conn->close(); // db connection closs
    ?>
    <br>
    <center><button type="submit" class="btn btn-success py-2 px-4">Update Profile</button></center>
    <br><br>
</form>