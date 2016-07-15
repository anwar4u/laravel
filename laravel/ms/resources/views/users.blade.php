<!--link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery.min.js" type="text/javascript"></script-->
<div class="clearfix"></div>
<div class="container-fluid" >
    <div class="row" id="userAddUpdateArea" style="display: none">
        <form id="userform">
            <div class="col-md-6">

                <label>Full Name</label><br>
                <div class="">
                    <input type="text" class="form-control" name="userfullname" id="userfullname" placeholder="Full Name here" required="required"/>
                    <span class="help-block"></span>
                </div>

                <label>Username</label><br>
                <div class="">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Full Name here" required="required"/>
                    <span class="help-block"></span>
                </div>

                <label>Password</label><br>
                <div class="">
                    <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Password here" required="required"/>
                    <span class="help-block"></span>
                </div>

                <label>Rank</label><br>                
                <div class="">
                    <select id="userrank" name="userrank" class="form-control">
                        <option value="">Select One</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <span class="help-block"></span>
                </div>


            </div>
            <div class="col-md-6">
                <label>Email Address</label><br>                
                <div class="">
                    <input type="email" class="form-control" name="useremail" id="useremail" placeholder="Email Address here" required="required"/>
                    <span class="help-block"></span>
                </div>

                <label>Status</label><br>                    
                <div class="">
                    <select id="userstatus" name="userstatus" class="form-control">
                        <option value="">Select One</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <span class="help-block"></span>
                </div>

                <label>Remarks</label><br>                
                <div class="">
                    <textarea id="userremarks" name="userremarks" class="form-control"></textarea>
                    <span class="help-block"></span>
                </div>

                <input type="submit" id="userformsubmit" class="btn btn-success" name="userformsubmit" value="Submit" />
                <input type="reset" id="userformreset" class="btn btn-info" name="userformreset" value="Reset" />
                <span id="userformcancel" class="btn btn-danger" name="userformcancel">Cancel</span>

            </div>
        </form>
    </div>


    <div class="row" id="userFilterArea">
        <div class="col-md-6 pull-left">

            <label>From</label><br>
            <input type="date" class="form-control" placeholder="mm/dd/yyyy" />
            <label>To</label><br>
            <input type="date" class="form-control" placeholder="mm/dd/yyyy" />
        </div>

        <div class="col-md-6 pull-right">
            <label>Search</label>
            <input type="text" placeholder="Search" class="form-control" /><br>
            <button class="btn btn-success" id="SearchUser">Search</button> 
            <button class="btn btn-success" id="AddNewUser">Add New</button>
        </div>
    </div>
</div>
<br>

<div class="clearfix"></div>

<div class="row">
    <div class="table-responsive">
        <div id="UserTableData">
        </div>  
    </div>
</div>



@push("js")

<script type="text/javascript">

    loadUsers();
// Load Users in the user 
    function loadUsers() {
        var url = '{{ route('userlist')}}'
        $.get(url, function (data) {
            var html = "";
            html += '<div class="table-responsive">';
            html += '<table class="table sar-table table-bordered"><tbody>';
            html += '<tr>';
            html += '<th style="width: 10px">#</th>';
            html += '<th> Full Name </th>';
            html += '<th> Username </th>';
            html += '<th> Email </th>';
            html += '<th> Ranks </th>';
            html += '<th> Details </th>';
            html += '<th> Action </th>';
            html += '</tr>';
            var i = 1;
            data.users.forEach(function (value, index) {
                html += "<tr>";
                html += "<td>" + i++ + "</td>";
                html += "<td>" + value.fullname + "</td>";
                html += "<td>" + value.username + "</td>";
                html += "<td>" + value.email + "</td>";
                html += "<td>" + value.rank + "</td>";
                html += "<td>" + value.rank + "</td>";
                html += "<td style='width:120px'>";
                html += '<a class="btn btn-sm btn-danger" title="Delete" onclick="DeleteUser(' + value.id + ')"><i class="glyphicon glyphicon-trash"></i></a>';
                html += '<a class="btn btn-sm btn-info" title="Edit" onclick="EditUser(' + value.id + ')"><i class="glyphicon glyphicon-pencil"></i></a>';
                html += '<a class="btn btn-sm btn-success" title="Details" onclick="ViewUser(' + value.id + ')"><i class="glyphicon glyphicon-th-list"></i></a>';
                html += "</td>";
                html += "</tr>";
            })
            html += "</tbody></table>";
            $("#UserTableData").html(html);
        }
        );
    }

// Delete Users
    function DeleteUser(id) {
        if (confirm('Are you sure delete this user ?')) {
            $.ajax({
                url: '{{route("deleteuser")}}/' + id,
                type: "GET",
                success: function (data) {
                    ShowActionMessage('Record deleted successfully!!!')
                    loadUsers();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    ShowActionMessage('Record deletion failed ', false)
                    loadUsers();
                }
            });
        }
    }

// Add User Button Action
    $("#AddNewUser").click(function () {
        $("#userFilterArea").hide("1000", 'linear')
        $("#userAddUpdateArea").show("1000", 'linear')
    })

// Add New User button actions
    $("#userformsubmit").click(function (e) {
        e.preventDefault();



        var fullname = $("#userform #userfullname").val();
        var username = $("#userform #username").val();
        var password = $("#userform #userpassword").val();
        var email = $("#userform #useremail").val();
        var rank_id = $("#userform #userrank").val();
        var status = $("#userform #userstatus").val();
        var remarks = $("#userform #userremarks").val();
        if (fullname == '') {
            $("#userfullname").parent().addClass('has-error')
            $("#userfullname").next().append("The Field is required!!");
            return;
        }

        if (username == '') {
            $("#username").parent().addClass('has-error')
            $("#username").next().append("The Field is required!!");
            return;
        }

        if (password == '') {
            $("#userpassword").parent().addClass('has-error')
            $("#userpassword").next().append("The Field is required!!");
            return;
        }

        if (email == '') {
            $("#useremail").parent().addClass('has-error')
            $("#useremail").next().append("The Field is required!!");
            return;
        }

        if (rank_id == '') {
            $("#userrank").parent().addClass('has-error')
            $("#userrank").next().append("The Field is required!!");
            return;
        }

        if (status == '') {
            $("#userstatus").parent().addClass('has-error')
            $("#userstatus").next().append("The Field is required!!");
            return;
        }

        if (remarks == '') {
            $("#userremarks").parent().addClass('has-error')
            $("#userremarks").next().append("The Field is required!!");
            return;
        }

        var url = '{{route("adduser")}}'
        $.ajax({
            method: "POST",
            url: url,
            data: {
                fullname: fullname,
                username: username,
                password: password,
                email: email,
                rank_id: rank_id,
                status: status,
                remarks: remarks,
                _token: token},
            success: function (data) {
                ShowActionMessage("New User added successfully!!", true);
                $("#userform").trigger('reset');
                loadUsers();
            }, error: function () {
                ShowActionMessage("New User cannot be added!!!", false);
                loadUsers();
            }
        });
    })
    /*
     var myval=JSON.stringify(data);
     alert(myval);
     */

// Add New User Form Cancel action    
    $(document).ready(function (e) {
        $("#userformcancel").click(function (e) {
            e.preventDefault();
            $("#userAddUpdateArea").hide("1000")
            $("#userFilterArea").show("1000")
        })
    })

</script>

@endpush