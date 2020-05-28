<template>
    <div>
        <section class="">
            <div class="ik-container">
                <div class="newsLeft">
                    <div class="judulDetail">{{berita.judul}}</div>
                    <div class="is-kategori">{{moment(berita.tgl_publish).startOf('day').fromNow()}}</div>
                    <img :src="url.gambar+'/'+berita.Folder+'/'+berita.gambar" class="detailImage">
                    <div class="imagecaption">{{berita.ket_gambar}}</div>
                    <p v-html="berita.isi_berita" class="isi_berita"></p>
                </div>




                <div class="newsRight">
                    <h1>afriandi</h1>
                    <pre>{{iklan}}</pre>
                    <div v-for="(i,Iindex) in iklan" :key="Iindex">
                        <img :src="url.iklan+'/'+i.iklan_name" class="">
                    </div>
                </div>
                <div class="clearer"></div>
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
                berita: [],
                iklan: [],
                url: {
                    gambar: urlBase.urlThumbnailBerita,
                    iklan: urlBase.iklan
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getBerita()
            this.getIklan()
        },
        props: ['id'],
        components: {
            Hooper,
            Slide,
            HooperProgress,
        },
        methods: {
            onStick(data) {
                console.log(data);
            },
            truncate: function(text, length, suffix) {
                return text.substring(0, length) + suffix;
            },
            moment(arg) {
                moment.locale('id');
                return moment(arg);
            },
            getBerita() {
                axios.post(urlBase.urlWeb + '/master/berita', {
                        type: "BeritaById",
                        id: this.id
                    })
                    .then(r => {
                        this.berita = r.data[0]
                    });
            },
            getIklan() {
                axios.post(urlBase.urlWeb + '/master/iklan', {
                        type: "iklanByDevice",
                        web: 'true',
                        is_main: "true",
                        is_detail: "true",
                        is_album: "false"
                    })
                    .then(r => {
                        this.iklan = r.data

                    });
            }
        },
    }

</script>
