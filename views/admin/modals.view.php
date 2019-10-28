<!-- Update Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/admin/users/update" method="POST">

            <div class="modal-body">
                    <input type="hidden" class="form-control" id="user_id" name="id">
                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email</label>
                        <input type="text" class="form-control" id="email" readOnly>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary update-btn">Update</button>
            </div>
        </form>

        </div>
    </div>
</div>


<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        

            <div class="modal-body">
                <form id="form" method="POST" action="/admin/users/create">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Name</label>
                        <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="full_name"
                        aria-describedby="nameHelp"
                        placeholder="Enter Name"
                        onfocusout="nameV()"
                        onfocusin="defultname()"
                        />
                        <small id="nameHelp" class="form-text text-muted"
                        >please enter your Correct name.</small
                        >
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        aria-describedby="emailHelp"
                        placeholder="Enter email"
                        onfocusout="emailV()"
                        onfocusin="defultemail()"
                        />
                        <small id="emailHelp" class="form-text text-muted"
                        >We'll never share your email with anyone else.</small
                        >
                    </div>

                    <div class="container">
                        <div class="row">
                        <div class="col-md-6 ">
                            <h6>Register as :</h6>
                            <select
                            class="btn bg-dim-gray py-2 text-white"
                            id="careerM"
                            onchange="talendM()"
                            name="user_type"
                            >
                            <option value="0">Choose</option>
                            <option value="2">Talented</option>
                            <option value="3">Organization</option>
                            <option value="4">Visitor</option>
                            </select>
                        </div>

                        <div class="col-md-6  displayNO" id="talendMenue">
                            <h6>Choose your talents</h6>
                            <div class="dropdown " >
                            <button
                                class="btn dropdown-toggle bg-dim-gray text-white"
                                type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                Choose
                            </button>
                            <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuButton"
                            >
                                <?php foreach($talents as $talent) { ?>
                                <input type="checkbox" class="ml-2" value=<?=$talent->id?> name="talent-types[]" />
                                <?= $talent->name ?><br />
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="exampleInputPassword1">Password</label>
                        <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Password"
                        onfocusout="passwordV()"
                        onfocusin="defultpassword()"
                        />
                        <span id="eye" class="fa fa-fw fa-eye field-icon toggle-password" onclick="showAndHide(this, 'password')" title="click to show or hide password"></span>
                        <small id="passwordHelp" class="form-text text-muted"
                        >Enter your password</small
                        >
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input
                        type="password"
                        class="form-control"
                        id="confirmPassword"
                        placeholder="Password"
                        onfocusout="passwordVC()"
                        onfocusin="defultpasswordC()"
                        />
                        <span id="eye" class="fa fa-fw fa-eye field-icon toggle-password" onclick="showAndHide(this, 'confirmPassword')" title="click to show or hide password"></span>
                        <small id="passwordConfirmHelp" class="form-text text-muted"
                        >Confirm your password</small
                        >
                    </div>

                    <button
                        type="submit"
                        class="btn text-white btn-block bg-dim-gray font-design"
                        id="submit-btn"
                    >
                        Create Account
                    </button>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary update-btn">Update</button>
            </div> -->

        </div>
    </div>
</div>


<!-- Delete Modal -->

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Delete
            </div>
            <div class="modal-body">
                Do you want to delete Account permanentely?             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>