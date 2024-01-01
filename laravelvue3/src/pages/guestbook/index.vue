
<script setup>
    import {
        ref,
        onMounted
    } from 'vue';
    //import api
    import api from '../../api/index';
    //define state
    const data_guestbook = ref([]);

    //method fetchDataguestbook
    const fetchDataGuestbook = async () => {
        //fetch data
        await api.get('/api/guestbook')
            .then(response => {
                //set response data to state "data_guestbook"
                data_diri.value = response.data.students
            });
    }
    onMounted(() => {
        fetchDataGuestbook();
    });

    //method deleteGuestbook
    const deleteGuestbook = async (id) => {
        //delete post with API
        await api.delete(`/api/guestbook/${id}`)
            .then(() => {
                //call method "fetchDataDiri"
                fetchDataGuestbook();
            })
    };
</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'guestbook.create' }"
                    class="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW ATA DIRI</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">NOMOR WA</th>
                                    <th scope="col" style="width:15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="data_diri.length == 0">
                                    <td colspan="4" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(dtmhs, index) in data_data" :key="index">
                                    <td>{{ dtmhs.nama }}</td>
                                    <td>{{ dtmhs.alamat }}</td>
                                    <td>{{ dtmhs.email }}</td>
                                    <td>{{ dtmhs.nomor_wa }}</td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'guestbook.edit', params: { id: dtmhs.id } }" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT
                                        </router-link>
                                        <button @click.prevent="deleteGuestbook(dtmhs.id)" class="btn btn-sm btn-danger rounded-sm shadow border-0">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
