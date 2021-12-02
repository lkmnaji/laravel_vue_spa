<template>
    <div class="div">
        <Navbar />
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Home</div>

            <div class="card-body">Home Page</div>
            </div>
        </div>
        </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../layouts/Navbar.vue'
export default {
    components : {
      Navbar
    }
}
</script>