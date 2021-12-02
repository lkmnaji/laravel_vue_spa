<template>
    <div class="div">
        <Navbar />
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"> Product Toko Makmur </h4>
                                <button class="btn btn-primary text-center" @click="$bvModal.show('modal-scoped')">Add Product</button>
                        </div>

                        <div class="card-body">
                            <table class="table table-secondary table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th> 
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in dataProduct" :key="index">
                                    <td>{{ ++index }}</td>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.description }}</td>
                                    <td>{{ item.stock }}</td>
                                    <td>{{ item.price }}</td>
                                    <td>
                                        <button class="btn btn-warning mb-3" style="color:white" type="button">
                                            <router-link :to="`/edit/${item.id}`">
                                                Edit
                                            </router-link>
                                        </button>
                                            <button
                                                type="button"
                                                class="btn btn-danger mb-3"
                                                @click="deleteProduct(item.id, index)"
                                            >
                                                Delete
                                            </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- modal create Product -->
                    <div
                        class="d-flex justify-content-center spinner-borderD"
                        v-if="popupActivo">
                        <div class="spinner-border text-warning" role="status">
                        </div>
                    </div>
                        <b-modal id="modal-scoped" ref="closeModal">
                            <template #modal-header="{ close }">
                                <h5>Create Product</h5>
                                    </template>
                                        <div class="form-group">
                                            <label class="col-form-label">Name Product:</label>
                                            <input type="text" v-model="dataProduct.name" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Deskripsi Produk:</label>
                                            <input type="text" v-model="dataProduct.description" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Stock Produk:</label>
                                            <input type="text" v-model="dataProduct.stock" class="form-control"/>
                                        </div>
                                           <div class="form-group">
                                            <label for="" class="col-form-label">Harga Produk:</label>
                                            <input type="text" v-model="dataProduct.price" class="form-control"/>
                                        </div>
                                        <template #modal-footer="{ ok, cancel }">
                                            <b-button size="sm" variant="danger" @click="cancel()">
                                                Cancel
                                            </b-button>
                                            <b-button size="sm" variant="success" @click="submitProduct()">
                                                submit
                                            </b-button>
                                    </template>
                        </b-modal>
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
            popupActivo: false,
        };
    },
    created() {
        this.getProduct()
    },
    methods: {
        async getProduct(){
            let getDataProduct = await axios.get('/api/product')
            this.dataProduct = getDataProduct.data.data
        },

        async submitProduct() {
            const params = {
                name: this.dataProduct.name,
                description: this.dataProduct.description,
                stock: this.dataProduct.stock,
                price: this.dataProduct.price,
            };
            this.popupActivo = true;
            axios
                .post("/api/product/post/", params)
                .then((response) => {
                    const data = response.data.data;
                    this.$emit("addItem", data);
                    this.dataProduct.push(data);
                    this.$refs.closeModal.hide();
                    setTimeout(() => {
                        this.popupActivo = false;
                    }, 5000);
                })
                .catch((e) => {
                    this.errors.push(e);
                });
        },

        async deleteProduct(id, index) {
            try {
                this.popupActivo = true;
                let result = await axios.delete(`/api/product/delete/${id}`);
                setTimeout(() => {
                    this.popupActivo = false;
                }, 5000);
                if (result.data.status === "success") {
                    this.dataProduct.splice(index, 1);
                }
            } catch (error) {
                throw error;
            }
        },

        editProduct(item, index) {
            this.put.name = item.name;
            this.put.description = item.description;
            this.put.stock = item.stock;
            this.put.price = item.price;
            this.idEdit = item.id;
            this.indexEdit = index;
            this.stateEdit = "edit";
        },

        async updateDataProduct() {
            try {
                this.popupActivo = true;
                await axios
                    .put(`api/product/update/${this.idEdit}`, {
                        name: this.put.name,
                        description: this.put.description,
                        stock: this.put.stock,
                        price: this.put.price,
                    })
                    .then((response) => {
                        const data = response.data.data;
                        this.posts[this.indexEdit].name = data.name;
                        this.posts[this.indexEdit].description = data.description;
                        this.posts[this.indexEdit].stock = data.stock;
                        this.posts[this.indexEdit].price = data.price;
                        setTimeout(() => {
                            this.popupActivo = false;
                        }, 5000);
                        this.idEdit = null;
                        this.indexEdit = null;
                        this.stateEdit = "defaultEdit";
                    });
            } catch (error) {
                throw error;
            }
        },


    },
};
</script>

<style scoped>
.spinner-borderD {
    width: 100%;
    height: 100vh;
    background: rgb(0, 0, 0, 0.6);
    position: absolute;
    top: 0;
    left: 0;
    z-index: 10000;
}
.spinner-border {
    margin-top: 20%;
}
</style>