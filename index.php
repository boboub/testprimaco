<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
<div class="container" id="myapp">
    <br />
    <h3 align="center">Test Primaco</h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="panel-title">List of users</h3>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                    <tr v-for="row in allData">
                        <td>{{ row.name }}</td>
                        <td>{{ row.username }}</td>
                        <td>{{ row.email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>

    var myuser = new Vue({
        el:'#myapp',
        data:{
            allData:'',
            myModel:false,
            actionButton:'Insert',
            dynamicTitle:'Add Data',
        },
        methods:{
            getUsers:function(){
                axios.post('script.php', {
                    action:'getUsers'
                }).then(function(response){
                    myuser.allData = response.data;
                });
            },
        },
        created:function(){
            this.getUsers();
        }
    });

</script>
