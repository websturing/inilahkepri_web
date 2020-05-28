<template>
    <div>
        <section class="bg-ocean">
            <div class="ik-container" style="margin-top:20px">
                <div class="newsHeadline">
                    <img :src="url.gambar+'/'+headline[0].Folder+'/'+headline[0].gambar" @click="Todetail('0')">
                    <div class="keterangan">
                        <p @click="Todetail('0')">{{headline[0].judul}}</p>
                        <span class="time">{{moment(headline[0].tgl_publish).format("LL")}}, {{moment(headline[0].tgl_publish).startOf('day').fromNow()}}</span>
                    </div>
                </div>
                <div class="newsGridFourH" v-for="(h,Hindex) in headline.slice(1)" :key="Hindex">
                    <img :src="url.gambar+'/'+h.Folder+'/'+h.gambar" class="ik-newsHeadline-img" @click="Todetail(Hindex+1)">
                    <p @click="Todetail(Hindex+1)">{{h.judul}}</p>
                </div>
                <div class="clearer"></div>

                <div class="newsLeft">
                    <div class="wrap" v-for="(h,Hindex) in Trending.slice(4)" :key="Hindex">
                        <div>
                            <img :src="url.gambar+'/'+h.Folder+'/'+h.gambar" @click="TodetailTre(Hindex)">
                            <div class="keterangan">
                                <div v-if="h.kategori == null">-</div>
                                <div v-else>
                                    <span class="kategori">{{h.kategori.nama_kategori}}</span>
                                </div>
                                <div class="judul" @click="TodetailTre(Hindex)">{{h.judul}}</div>
                                <span class="time">{{moment(h.tgl_publish).format("LL")}}, {{moment(h.tgl_publish).startOf('day').fromNow()}}</span>
                            </div>
                            <div class="clearer"></div>
                        </div>
                        <div v-if="Hindex == 5">
                            <album></album>
                        </div>

                    </div>
                </div>
                <div class="newsRight" sticky-container :style="{'height' : righHeigh}">
                    <div v-sticky sticky-offset="{top: 10, bottom: 0}" sticky-side="both" on-stick="onStick">
                        <div v-for="(i,Iindex) in preiklan" :key="Iindex">
                            <img :src="url.iklan+'/'+i.iklan_name" class="">
                        </div>
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
    import album from '@/js/components/album/component';


    export default {
        data() {
            return {
                righHeigh: "2500px",
                headline: [],
                Trending: [],
                iklan: [],
                url: {
                    gambar: urlBase.urlThumbnailBerita,
                    iklan: urlBase.iklan
                },
                filterCategory: 'main'
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getHeadline()
            this.getTrending()
            this.getIklan()
        },
        computed: {
            preiklan() {
                let iklan = this.iklan
                if (this.filterCategory && this.filterCategory !== 'all') {
                    iklan = iklan.filter((p) => {
                        let foundCategory = p.iklan_position.findIndex((c) => {
                            return c.show_on === this.filterCategory
                        })
                        return foundCategory !== -1
                    })
                }
                return iklan
            }
        },
        components: {
            Hooper,
            Slide,
            HooperProgress,
            album
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
            getIklan() {
                axios.post(urlBase.urlWeb + '/master/iklan', {
                        type: "iklanByDevice",
                    })
                    .then(r => {
                        this.iklan = r.data

                    });
            },
            Todetail(i) {
                window.location.href = urlBase.urlWeb + this.headline[i].LinkTo
            },
            TodetailTre(i) {
                let a = i + 4;
                window.location.href = urlBase.urlWeb + this.Trending[i].LinkTo
            },
        },
    }

</script>
