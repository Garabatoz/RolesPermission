<template>
    <div class="loader d-flex" v-if="loading">
        <p class="loading m-auto"></p>
    </div>

    <div class="d-flex no-auth" v-else-if="products.viewAll_index == false">
        <div class="d-flex flex-column m-auto">
            <h1 class="text-center">401</h1>
            <h1 class="text-center">UNAUTHORIZED</h1>
            <h5 class="text-center">{{ products.message }}</h5>
        </div>
    </div>

    <section id="all-products" class="view-table" v-else>
        <h3 class="mb-3">All Products</h3>

        <table class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Brand</th>
                    <th>Categ</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Discount Price</th>
                    <th>Rating</th>
                    <th>Query</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products.data.data" :key="index">
                    <td>
                        {{ (products.data.current_page - 1) * 12 + index + 1 }}
                    </td>
                    <td>{{ product.brand }}</td>
                    <td>{{ product.category }}</td>
                    <td>{{ product.model }}</td>
                    <td>$ {{ product.price }}</td>
                    <td>{{ product.discount }}%</td>
                    <td>$ {{ product.discount_price }}</td>
                    <td>{{ product.rating }}</td>
                    <td class="d-flex flex-row justify-content-center">
                        <router-link
                            :to="{
                                name: 'viewProduct',
                                params: { id: product.id },
                            }"
                            class="bg-primary text-white p-1 mr-1 cursor-pointer border-radius-5px"
                            v-if="products.view_index !== false"
                        >
                            <font-awesome-icon :icon="['fa', 'eye']" />
                        </router-link>
                        <router-link
                            :to="{
                                name: 'editProduct',
                                params: { id: product.id },
                            }"
                            class="bg-success text-white p-1 mr-1 cursor-pointer border-radius-5px"
                            v-if="products.edit_index !== false"
                        >
                            <font-awesome-icon :icon="['fa', 'edit']" />
                        </router-link>
                        <router-link
                            :to="{
                                name: 'deleteProduct',
                                params: { id: product.id },
                            }"
                            class="bg-danger text-white p-1 cursor-pointer border-radius-5px"
                            v-if="products.delete_index !== false"
                        >
                            <font-awesome-icon :icon="['fa', 'trash-alt']" />
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="pagination-container">
            <pagination
                :data="products.data"
                @pagination-change-page="getProducts"
                :limit="1"
                align="center"
                :show-disabled="true"
            />
        </div>
    </section>
</template>

<script>
import pagination from 'laravel-vue-pagination';


export default {
    data() {
        return {
            products: {},
            loading: false,
            user: {},
        };
    },

    components: {
        pagination,
    },

    methods: {
        getProducts(page) {
            this.loading = true;
            if (typeof page == 'undefined') {
                page = 1;
            }
            axios
                .get('api/admin?page=' + page, {
                    headers: {
                        'Authorization': 'Bearer ' + '"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiY2FhOWEzZWNjNWEwOGUwNmJlOGIxYTMzYjhjZTkzNmQ3MWIzMzQzYWJmYmY2ODU0YWYzMDUwOTliNWY4NTI2Nzc0ZjIzODgyMGRiMmY5NDYiLCJpYXQiOjE2ODc3MjU5MTIuNjY1NTYyLCJuYmYiOjE2ODc3MjU5MTIuNjY1NTY1LCJleHAiOjE3MTkzNDgzMTIuNjU3MDc1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YDQLByOtJ-y-3Qcgm9AYhSFCljzEdyC-TXfWakf--U6tADw-ZduZz1xDx8EnPzrb9r8HjiAwSgG6VXHxOGBH_BYz1Q6cm384lagw6kaW4J2IQyLcgzyCu9GA69tLOmQ7cI8pWpv6mOMOtTRwhDqmCAoVRWGVwsHb-TA-xl7MzC9RVXZYZnDK_67CKcYmserkhEV_R949boXR6X-qqHxjtaSZ8Sp0vCgtzOAiM5nYu94QiUu7THJ85yGPBy0NmXvQPCDFl6fuAhIDB0x3fE-AyRmMgYvLd9uVqNz7n3l7dQEe2wT-W6VXbERwS6wo8wScPKo2tMsF-fW_GIB2UaNC3eqEFoHdaSd84IsbG9fkRgscFVmgIBx-KTCePkHaeWxPIn3y67mPNPjq7DCIN6Vma4sfUi1Zjz1FteIuR5qe_7pMq87GtboTTfSh16pSMTMJlb1aHNv9Y6QXc-fEwt81hETvsDQZKqtQNTfBYRFjAcMGigpOlIp4jFysVDM_WZ8E3PHwBA8PYnHRf9iTnJJL5wwaL51tIgZH04wPyQzPQtek9iMY0XOXTq5HB7z5-36NrHvVvXqOSPUC-p5v9AFwj0ntb1NCKSWCBosA_i6XLcBSshw0PtuGfUM6cFT2RilwnEUu1reXwZ3l28fWYx-KkmmmI0bF4Jrm7du6k8WkMoA"'
                    }
                })
                .then(response => {
                    if (response.status == 200) {
                        this.products = response.data;
                        this.loading = false;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },

    created() {
        this.getProducts();
    },
};
</script>
