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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date Star</th>
                    <th>Date End</th>
                    <th>Query</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products.data.data" :key="index">
                    <td>
                        {{ (products.data.current_page - 1) * 12 + index + 1 }}
                    </td>
                    <td>{{ product.title }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.date_start }}</td>
                    <td>{{ product.date_end }}</td>
                    <td class="d-flex flex-row justify-content-center">
                        <router-link
                            :to="{
                                name: 'viewProject',
                                params: { id: product.id },
                            }"
                            class="bg-primary text-white p-1 mr-1 cursor-pointer border-radius-5px"
                            v-if="products.view_index !== false"
                        >
                            <font-awesome-icon :icon="['fa', 'eye']" />
                        </router-link>
                        <router-link
                            :to="{
                                name: 'editEdit',
                                params: { id: product.id },
                            }"
                            class="bg-success text-white p-1 mr-1 cursor-pointer border-radius-5px"
                            v-if="products.edit_index !== false"
                        >
                            <font-awesome-icon :icon="['fa', 'edit']" />
                        </router-link>
                        <router-link
                            :to="{
                                name: 'deleteProject',
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
                    /* headers: {
                        'Authorization': 'Bearer ' + "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTg1Y2VhZDY5NjQyMTI4ZDJkYmY0YTE4NzE5ZTFiODNkODNmYTFjMTA0MmYwMGRhN2VjODMxNmE2ZTQ4MzdjMDczOGIyMDBkN2QxYTQ1ZDEiLCJpYXQiOjE2ODc3MjczOTguODEyNjEzLCJuYmYiOjE2ODc3MjczOTguODEyNjE3LCJleHAiOjE3MTkzNDk3OTguODAzODM2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.bkFhsNp526kPazm_QhwqdEu8dTc8-B2kuAcdg7A9i2QlAwxU6iHOMpu5I5hteyLvlHkSzsDbnUkz7gPZMqFHqOnTGHXZN4cl94-4TLkN-NEckvr7RvlXW9anWkVURk5W4B6fk6IYA3YE2IsTyu2yM7yyjObhvergbUbN0JVYn6_h-C3fK-TAx2k4cQaNJNX_W0AGkJPxtooUNW8jIT8WtpzR3RJHjfkqBc00BSGVVVJmJ-0_bzuQdswMsoLqdTcftxfYXDZyD6CmdeeA14nW1iUsTZf3lWiVO6fliMnZrvbe6WhmxBfbw8G6YzbXewvpPBk6sD2ApZ8NaGE16PKtdR4cSmY1fNnR12392CkkTTS1MPA-NIj_MNdIKKXCMqboMWY8B2BV1cpwK0yp_U2SqimzMDAC4TGjlDl45otZDOtZQ59PxpiNi-3NIKH95dh4xXJAppjna3Jg3Fq8ulMDS0ahcQVidsE-I5G5HgWoD-1pE4Y40jc0RC1MeNxr8vO03RaHrsnDeXJVWBfSEKYgDttPDWUhTyWEAEFYqA0jDXwqdxLB_cQqSG9tp8KvwhkOMoCDUx2vZnrFa3CqbApBn2XXStL3DpNGEQcK2KQb7Xxv8EbQfr4PYoZvJtPj293wN0y6G1IcenR54o4mx3BcPkhDYQK2sj0SNvKZxbM3TVA",
                    } */
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
        window.localStorage.getItem('user');
    },
};
</script>
