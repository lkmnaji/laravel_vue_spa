<template>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"> Login User </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Your Password">
                            </div>
                            <button @click="Submit()" type="button" class="btn btn-success" >Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return {
                data: [],
            }
        },

        methods:{
            async Submit() {
                let email = document.getElementById('email').value
                let password = document.getElementById('password').value
                let params = { email: email, password: password }
                let post = await axios.post(`/api/login/`, params );
                console.log(post.data.message.token);
                if(post.status){
                localStorage.setItem('_token', post.data.message.token);
                this.$router.push({ name: 'create' });
                }
            }
        }
    }
</script>