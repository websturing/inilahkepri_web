<template>
  <div>
    <section class>
      <div class="ik-container">
        <div class="newsLeft">
          <div v-for="(i, Iindex) in preiklanByAboveTitle" :key="Iindex">
            <img
              :src="url.iklan + '/' + i.iklan_name"
              style="
                width: 100% !important;
                border-radius: 0px;
                margin-bottom: 10px;
              "
            />
          </div>
          <div class="judulDetail">{{ berita.judul }}</div>
          <div class="is-kategori">
            {{ moment(berita.tgl_publish).format("l") }}
          </div>
          <img
            :src="url.gambar + '/' + berita.Folder + '/' + berita.gambar"
            class="detailImage"
          />
          <div class="imagecaption">{{ berita.ket_gambar }}</div>
          <p v-html="berita.isi_berita" class="isi_berita"></p>
          <img :src="url.iklan + '/bannerCovid.gif'" style="width: 100%" />
        </div>

        <div class="newsRight">
          <div v-for="(i, Iindex) in preiklanByRightContent" :key="Iindex">
            <img :src="url.iklan + '/' + i.iklan_name" class />
          </div>
        </div>
        <div class="clearer"></div>
      </div>
    </section>
  </div>
</template>

<script>
import urlBase from "@/js/url";
import { Hooper, Slide, Progress as HooperProgress } from "hooper";
import "hooper/dist/hooper.css";
import moment from "moment";

export default {
  data() {
    return {
      righHeigh: "2500px",
      berita: [],
      iklan: [],
      url: {
        gambar: urlBase.urlThumbnailBerita,
        iklan: urlBase.iklan,
      },
      filterCategory: "detail",
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.getBerita();
    this.getIklan();
    this.AddViewer();
  },
  computed: {
    preiklanByRightContent() {
      let iklan = this.iklan;
      if (this.filterCategory && this.filterCategory !== "all") {
        iklan = iklan.filter((p) => {
          let foundCategory = p.iklan_position.findIndex((c) => {
            return (
              c.show_on === this.filterCategory &&
              c.position === "right_content"
            );
          });
          return foundCategory !== -1;
        });
      }
      return iklan;
    },
    preiklanByAboveTitle() {
      let iklan = this.iklan;
      if (this.filterCategory && this.filterCategory !== "all") {
        iklan = iklan.filter((p) => {
          let foundCategory = p.iklan_position.findIndex((c) => {
            return (
              c.show_on === this.filterCategory && c.position === "above_title"
            );
          });
          return foundCategory !== -1;
        });
      }
      return iklan;
    },
  },
  props: ["id"],
  components: {
    Hooper,
    Slide,
    HooperProgress,
  },
  methods: {
    onStick(data) {
      console.log(data);
    },
    truncate: function (text, length, suffix) {
      return text.substring(0, length) + suffix;
    },
    moment(arg) {
      moment.locale("id");
      return moment(arg);
    },
    getBerita() {
      axios
        .post(urlBase.urlWeb + "/master/berita", {
          type: "BeritaById",
          id: this.id,
        })
        .then((r) => {
          this.berita = r.data[0];
        });
    },
    AddViewer() {
      axios
        .post(urlBase.urlWeb + "/master/berita", {
          type: "AddViewer",
          id: this.id,
        })
        .then((r) => {
          console.log(r.data);
        });
    },
    getIklan() {
      axios
        .post(urlBase.urlWeb + "/master/iklan", {
          type: "iklanByDevice",
          web: "true",
        })
        .then((r) => {
          this.iklan = r.data;
        });
    },
  },
};
</script>
