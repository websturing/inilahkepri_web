<template>
    <div>
        <section class="bg-ocean" style="padding-top:10px">
            <div class="ik-container" style="margin-top:20px">
                <pre>
                {{album}}
                </pre>
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
    .AbmJudul {
        float: left;
        width: 460px;
        margin-right: 10px;
        font-size: 20px;
        line-height: 23px;
        font-weight: 600;
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
