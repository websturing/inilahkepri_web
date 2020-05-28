<template>
    <div>
        <section class="headline-content ik-sideStrip" style="margin-top:-80px">
            <div class="ik-container">
                <Hooper style="height: 400px" :infiniteScroll="true" :autoPlay="true" :playSpeed="4000" :wheelControl="false">
                    <Slide v-for="(h,Hindex) in headline" :key="h.id_berita">
                        <div class="headlineLeft">
                            <div class="padd-10">
                                <span class="ik-date-p">{{moment(h.tgl_publish).format("LL")}}</span>
                                <h1 @click="Todetail(Hindex)">{{h.judul}}</h1>
                                <p v-html="truncate(h.isi_berita,300, '...')"></p>
                                <span class="ik-date-p text-right" @click="Todetail(Hindex)">Baca Selengkapnya <i class="fa fa-arrow-right"></i></span>
                            </div>
                        </div>
                        <div class="headlineRight">
                            <div class="padd-10 ik-sideStrip-headline">
                                <img :src="url.gambar+'/'+h.Folder+'/'+h.gambar" class="ik-headline-img">
                            </div>
                        </div>
                        <div class="clearer"></div>
                    </Slide>
                </Hooper>


                <div class="newTranding">
                    <Hooper style="height: 250px" :itemsToShow="4" :infiniteScroll="true" :autoPlay="true" :playSpeed="5000">
                        <Slide v-for="(t, tIndex)  in Trending" :key="t.id_berita">
                            <div class="panel">
                                <img :src="url.gambar+'/'+t.Folder+'/'+t.gambar" class="ik-headline-img" @click="TodetailTre(tIndex)">
                                <p @click="TodetailTre(tIndex)" class="judulTrending">{{t.judul}}</p>
                                <span class="time">{{moment(t.tgl_publish).format("LL")}}, {{moment(t.tgl_publish).startOf('day').fromNow()}}</span>
                            </div>
                        </Slide>
                    </Hooper>
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
    import news from '@/js/components/utama/news'

    export default {
        data() {
            return {
                headline: [],
                Trending: [],
                url: {
                    gambar: urlBase.urlThumbnailBerita
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getHeadline()
            this.getTrending()
        },
        components: {
            Hooper,
            Slide,
            HooperProgress,
            news
        },
        methods: {
            truncate: function(text, length, suffix) {
                return text.substring(0, length) + suffix;
            },
            moment(arg) {
                moment.locale('id');
                return moment(arg);
            },
            getHeadline() {
                axios.post(urlBase.urlWeb + '/master/berita', {
                        type: "BeritaByHeadline"
                    })
                    .then(r => {
                        this.headline = r.data
                    });
            },
            getTrending() {
                axios.post(urlBase.urlWeb + '/master/berita', {
                        type: "BeritaTrending"
                    })
                    .then(r => {
                        console.log("trending"),
                            console.log(r.data),
                            this.Trending = r.data

                    });
            },
            Todetail(i) {
                window.location.href = urlBase.urlWeb + this.headline[i].LinkTo
            },
            TodetailTre(i) {
                window.location.href = urlBase.urlWeb + this.Trending[i].LinkTo
            },
        },
    }

</script>
<style>
    .judulTrending {
        cursor: pointer;
    }

    .ik-date-p {
        cursor: pointer;
    }

</style>
