<template>
    <div>
        <section class="bg-ocean" style="padding-top:10px">
            <div class="ik-container" style="margin-top:20px">
                <div v-for="(a,Aindex) in album.slice(0,1)">
                    <div class="AbmJudul" @click="ToLink(Aindex)">
                        {{a.judul}}
                        <div class="time">{{moment(a.tanggal).format("LL")}}</div>
                    </div>
                    <div class="abm-img">
                        <img :src="url.album+'/'+a.foto">
                    </div>
                    <div class="clearer"></div>
                </div>

                <div v-for="(a,Aindex) in album.slice(1,4)">
                    <div class="galleryOther">
                        <img :src="url.album+'/'+a.foto">
                        <div class="judulGallery" @click="ToLink(Aindex)">{{a.judul}}</div>
                        <div class="time">{{moment(a.tanggal).format("LL")}}</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import urlBase from '@/js/url'
    import {
        Hooper,
        Slide,
        Progress as HooperProgress
    } from 'hooper'
    import 'hooper/dist/hooper.css'
    import moment from 'moment'


    export default {
        data() {
            return {
                righHeigh: "2500px",
                album: [],
                iklan: [],
                url: {
                    gambar: urlBase.urlThumbnailBerita,
                    iklan: urlBase.iklan,
                    album: urlBase.album
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getAlbum()
        },
        components: {
            Hooper,
            Slide,
            HooperProgress,
        },
        methods: {
            moment(arg) {
                moment.locale('id');
                return moment(arg);
            },
            getAlbum() {
                axios.post(urlBase.urlWeb + '/master/album', {
                        type: "BeritaByDate"
                    })
                    .then(r => {
                        this.album = r.data
                    });
            },
            ToLink(i) {
                let a = i + 1;
                window.location.href = urlBase.urlWeb + this.album[a].LinkTo
            },
        },
    }

</script>
<style>
    .AbmJudul {
        float: left;
        width: 460px;
        margin-right: 10px;
        font-size: 20px;
        line-height: 23px;
        font-weight: 600;
        cursor: pointer;
    }

    .abm-img {
        float: left;
        width: 200px;
    }

    .abm-img img {
        width: 200px;
        height: 180px;
        object-fit: cover;
        border-radius: 5px;
    }

    .galleryOther {
        font-size: 14px;
        float: left;
        width: 223px;
        min-height: 220px;
        padding: 5px;
    }

    .galleryOther img {
        width: 100%;
        object-fit: cover;
        height: 120px;
        border-radius: 10px;
    }

    .judulGallery {
        font-size: 13px;
        line-height: 16px;
        cursor: pointer;
    }

</style>
