<template>
    <div>
        <section class="bg-ocean" style="padding-top:10px">
            <div class="" style="margin-top:20px">
                <div class="AlbumHeadline">
                    <div class="albumLeft">
                        <div id="judul">
                            {{album.judul}}
                            <div class="is-kategori">{{moment(album.tanggal).startOf('day').fromNow()}}</div>
                            <hr />
                            <div class="description" v-html="album.deskripsi"></div>
                        </div>


                    </div>
                    <div class="albumRight">
                        <img :src="url.album+'/'+album.foto" class="gallery">
                        <span v-for="(g,gIndex) in album.gallery" :key="gIndex">
                            <img :src="url.gallery+'/'+g.foto" class="gallery">
                        </span>
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

                album: {},
                iklan: [],
                url: {
                    gallery: urlBase.gallery,
                    gambar: urlBase.urlThumbnailBerita,
                    iklan: urlBase.iklan,
                    album: urlBase.album,
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
        props: ['id'],
        methods: {
            moment(arg) {
                moment.locale('id');
                return moment(arg);
            },
            getAlbum() {
                axios.post(urlBase.urlWeb + '/master/album', {
                        type: "AlbumById",
                        id: this.id
                    })
                    .then(r => {
                        this.album = r.data[0]
                    });
            },
        },
    }

</script>
<style>
    hr {
        border: 1px solid #B6B6B6;
    }

    .AlbumHeadline {
        width: 1366px;
        margin-left: auto;
        margin-right: auto;
    }

    .AlbumHeadline .albumLeft {
        float: left;
        width: 1366px;
    }

    .AlbumHeadline #judul {
        float: left;
        width: 450px;
        font-size: 24px;
        padding-right: 5px;
        font-weight: bold;
    }

    .AlbumHeadline .description {
        font-size: 13px;
        padding: 0px 15px 5px 5px;
        text-align: justify;
        font-weight: 400;
    }

    .AlbumHeadline .albumRight {
        float: left;
        width: 1366px;
    }

    .gallery {
        width: 300px;
        float: left;
        padding: 5px;
        border-radius: 10px;
        min-height: 280px;
        object-fit: cover;
        -webkit-box-shadow: 7px -7px 31px -20px rgba(182, 182, 182, 0.92);
        -moz-box-shadow: 7px -7px 31px -20px rgba(182, 182, 182, 0.92);
        box-shadow: 7px -7px 31px -20px rgba(182, 182, 182, 0.92);
    }

    .is-kategori {
        font-size: 13px;
        font-weight: 400;
        font-size: 10px;
        color: #B6B6B6;
    }

</style>
