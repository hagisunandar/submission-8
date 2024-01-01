<script setup>
//import ref
import { ref, onMounted } from "vue";
//import router
import { useRouter, useRoute } from 'vue-router';
//import api
import api from "../../api/index";

//init router
const router = useRouter();
//init route
const route = useRoute();

//define state
const nama = ref("");
const alamat = ref("");
const email = ref("");
const nomor_wa = ref("");
const errors = ref([]);

//onMounted
onMounted(async () => {
    //fetch detail data post by ID
    await api.get(`/api/guestbook/${route.params.id}`)
        .then(response => {
            //set response data to state
            nama.value = response.data.data.nama
            alamat.value = response.data.data.alamat
            email.value = response.data.data.email
            nomor_wa.value = response.data.data.nomor_wa
        });
})


//method "updateMahasiswa"
const updateMahasiswa = async () => {

    //init formData
    let formData = new FormData();

    //assign state value to formData
    formData.append("nama", nama.value);
    formData.append("alamat", alamat.value);
    formData.append("email", email.value);
    formData.append("nomor_wa", nomor_wa.value);
    formData.append("_method", "PUT");

    //store data with API
    await api.post(`/api/guestbook/${route.params.id}`, formData)
        .then(() => {
            //redirect
            router.push({ path: "/guestbook" });
        })
        .catch((error) => {
            //assign response error data to state "errors"
            errors.value = error.response.data;
        });
};
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="updateMahasiswa()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control" v-model="nama" placeholder="nama Guestbook">
                                <div v-if="errors.nama" class="alert alert-danger mt-2">
                                    <span>{{ errors.nama[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Alamat</label>
                                <input type="text" class="form-control" v-model="alamat" placeholder="alamat Guestbook">
                                <div v-if="errors.alamat" class="alert alert-danger mt-2">
                                    <span>{{ errors.alamat[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <input type="text" class="form-control" v-model="email" placeholder="email Guestbook">
                                <div v-if="errors.email" class="alert alert-danger mt-2">
                                    <span>{{ errors.email[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor WA</label>
                                <input type="text" class="form-control" v-model="nomor_wa" placeholder="nomor_wa Guestbook">
                                <div v-if="errors.nomor_wa" class="alert alert-danger mt-2">
                                    <span>{{ errors.nomor_wa[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
