<template>
      <div class="div">
        <Navbar />
        <div class="container mt-4">
            <div class="card">
                <h3 class="text-center">Form Stock Product Toko Makmur Jaya</h3>

                <div v-show="state == 0">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="pic" width="50%" />
                        </div>
                        <div class="box-kotak col-lg-4"></div>
                        <div class="box-kotak col-lg-4"></div>
                    </div>
                    <div class="mt-4">
                        <label for="exampleInputEmail1">Type Product</label>
                        <input type="text" v-model="type_product" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button class="btn btn-success" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="state == 1">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="pic" width="50%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="pic1" width="50%" />
                        </div>
                        <div class="box-kotak col-lg-4"></div>
                    </div>
                    <div class="mt-4">
                          <br />
                        <hr style="border: 1px solid black;" />
                        <label for="productName" class="mt-3"
                            >Product Name</label
                        >
                        <input type="text" v-model="product_name" class="form-control" />
                        <label for="date" class="mt-3"
                            >Date</label
                        >
                        <input type="Date" v-model="date" class="form-control" />

                        <label for="quantity" class="mt-3"
                            >Quantity</label
                        >
                        <input type="text" v-model="quantity" class="form-control" />

                        <label for="image" class="mt-3"
                            >Image Product</label
                        >
                        <input type="file" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div
                                :class="state == 0 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 0">
                                    <button
                                        class="btn btn-primary"
                                        type="button"
                                    >
                                        Previous
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div
                                :class="state == 2 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 2">
                                    <button class="btn btn-success" type="button">
                                        Next
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="state == 2">
                    <div class="row text-center mt-4 box">
                        <div class="box-kotak col-lg-4">
                            <img :src="pic" width="50%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="pic1" width="50%" />
                        </div>
                        <div class="box-kotak col-lg-4">
                            <img :src="pic2" width="50%" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="exampleInputEmail1" class="mt-3"
                            >PIC Store </label
                        >
                        <input type="text" v-model="pic_store" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div
                                :class="state == 1 ? 'active' : ''"
                                class="mt-4"
                            >
                                <a @click="state = 1">
                                    <button
                                        class="btn btn-primary"
                                        type="button"
                                    >
                                        Previous
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="9"
                                            height="8"
                                            fill="currentColor"
                                            class="bi bi-caret-right-fill"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"
                                            />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div class="mt-4">
                                <div class="button-submit">
                                    <button type="button" class="btn btn-warning" @click="submitStockProduct()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from '../../layouts/Navbar.vue'
import picture3 from "../../assets/images/bahan3.png";
import picture2 from "../../assets/images/bahan2.png";
import picture1 from "../../assets/images/bahan1.png";

export default {
     components : {
      Navbar
    },

    data() {
        return {
            pic2: picture3,
            pic1: picture2,
            pic: picture1,
            data: [],
            type_product: '',
            product_name : '',
            date : '',
            quantity : '',
            pic_store : '',
            state: 0,
            disable: 0
        };
    },

     methods:{

        async submitStockProduct() {
            try {
                let params = { type_product: this.type_product, 
                           product_name: this.product_name,  
                           quantity: this.quantity,
                           date: this.date,
                           pic_store: this.pic_store,
                        }
                let store = await axios.post(`/api/stockproduct/store-stockproduct`, params)
                console.log(store);
            } catch (error) {
                
            }
            
        }
    }
}
</script>

<style scoped lang="scss">
.card {
    width: 100%;
    height: 100%;
    background-color: #ffffff;
    border-radius: 2rem;
    border: 2px solid white;
    box-shadow: white 0px 0px 8px;
    padding: 4rem;
}

.text-right {
    text-align: right;
    margin-top: 1rem;
}
</style>

