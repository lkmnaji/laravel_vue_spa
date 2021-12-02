<template>
    <div class="div">
        <Navbar />
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
                </div>

                <div class="card-body">
                    <div>
                        <b-form @submit.prevent="updateDataProduct">
                            <b-form-group id="name" label="Nama Product:" label-for="name">
                                <b-form-input
                                id="name"
                                v-model="dataProduct.name"
                                type="text"
                                placeholder="Masukkan nama Product"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group id="description" label="Deskripsi Produk:" label-for="Deskripsi">
                                <b-form-input
                                id="description"
                                v-model="dataProduct.description"
                                type="text"
                                placeholder="Masukkan deskripsi Produk"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group id="stock" label="Stock Produk:" label-for="stock">
                                <b-form-input
                                id="stock"
                                v-model="dataProduct.stock"
                                type="text"
                                placeholder="Masukkan stock Produk"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group id="price" label="Harga Produk:" label-for="price">
                                <b-form-input
                                id="price"
                                v-model="dataProduct.price"
                                type="text"
                                placeholder="Masukkan Harga Produk"
                                ></b-form-input>
                            </b-form-group>
                            <br>

                            <b-button type="reset" variant="danger">cancel</b-button>
                            <b-button type="submit" variant="primary">Submit</b-button>
                        </b-form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../layouts/Navbar.vue';
import axios from "axios";

export default {
    components : {
      Navbar
    },
    data() {
        return {
            dataProduct: [],
        };
    },
    created() {
        this.getData()
    },
    methods: {
        async getData() 
        {
            let url = window.location.href;
            let result = url.split('/');
            let id = result[4];
            let dataEditProduct = await axios.get(`/api/product/edit/${id}`);
            this.dataProduct = dataEditProduct.data.data
        },

        async updateDataProduct() 
        {
            let url = window.location.href;
            let result = url.split('/');
            let id = result[4];
            let data = await axios.put(`/api/product/update/${id}`. this.dataProduct)
            .then((response) => {
                this.$router.push({
                    name: 'create'
                });
                console.log(response);
            }).
        }
    },
}
</script>