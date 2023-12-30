<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card w-100 p-3">
                <div class="card-body">
                    <h6>User Profile</h6>

                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input readonly id="email" placeholder="User Email" class="form-control form-control-sm" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>First Name</label>
                                <input id="firstName" placeholder="First Name" class="form-control form-control-sm" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Last Name</label>
                                <input id="lastName" placeholder="Last Name" class="form-control form-control-sm" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="phone" placeholder="Mobile" class="form-control form-control-sm" type="mobile"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control form-control-sm" type="text"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ route("logout") }}" class="btn-success w-100 mt-5 btn btn-sm mx-4">Logout</a>
        </div>
    </div>
</div>



<script>
    userDetails();
    async function userDetails() {
        
        showLoader();
        let res=await axios.get("/userDetails");
        console.log(res.data)
        hideLoader();

        document.getElementById('firstName').value=res.data["firstName"];
        document.getElementById('lastName').value=res.data["lastName"];
        document.getElementById('email').value=res.data["email"];
         document.getElementById('phone').value=res.data["phone"];
         document.getElementById('password').value=res.data["password"];
    }
</script>




