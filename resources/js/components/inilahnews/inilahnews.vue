<template>
  <div>
    <el-row type="flex" justify="center">
      <el-col :md="20" :offset="2">
        <el-row>
          <el-col :md="6">
            <el-date-picker
              v-model="sort.date"
              type="daterange"
              align="right"
              unlink-panels
              range-separator="/"
              start-placeholder="Start date"
              end-placeholder="End date"
              :picker-options="pickerOptions"
            ></el-date-picker>
          </el-col>

          <el-col :md="3">
            <el-select
              v-model="sort.kategori"
              filterable
              placeholder="Select"
              @change="subgetKategori()"
            >
              <el-option
                v-for="item in kategori.slice().reverse()"
                :key="item.id_kategori"
                :label="item.nama_kategori"
                :value="item.id_kategori"
              ></el-option>
            </el-select>
          </el-col>
          <el-col :md="3" v-if="sort.subkategoriShow">
            <el-select v-model="sort.subkategori" filterable placeholder="Select">
              <el-option
                v-for="item in subkategori.slice().reverse()"
                :key="item.id_subkategori"
                :label="item.nama_subkategori"
                :value="item.id_subkategori"
              ></el-option>
            </el-select>
          </el-col>
          <el-col :md="2">
            <el-button type="primary" @click="sortBy()">Sorting</el-button>
          </el-col>
        </el-row>
        <el-divider></el-divider>
        <el-row :gutter="10">
          <el-col :md="6" v-for="(b,Bindex) in berita.data" :key="Bindex">
            <el-image
              :src="url.ThumbnailBerita+'/'+b.Folder+'/'+b.gambar"
              style="width:390px; height: 230px"
              fit="cover"
            >
              <div slot="placeholder" class="image-slot">
                Loading
                <span class="dot">...</span>
              </div>
            </el-image>
            <a class="judul">{{b.judul}} ...</a>
            <el-row :gutter="10">
              <el-col :md="12">
                <div class="is-kategori" v-if="b.kategori != null">
                  {{b.kategori.nama_kategori}}
                  <span
                    class="is-subkategori"
                    v-if="b.subkategori != null"
                  >| {{b.subkategori.nama_subkategori}}</span>
                </div>
              </el-col>
              <el-col :md="12">
                <span
                  class="time"
                >{{moment(b.tgl_publish).format("LL")}}, {{moment(b.tgl_publish).startOf('day').fromNow()}}</span>
              </el-col>
            </el-row>
          </el-col>
        </el-row>
      </el-col>
    </el-row>
  </div>
</template>
<script>
import urlBase from "@/js/url";
import moment from "moment";
export default {
  data() {
    return {
      url: {
        ThumbnailBerita: urlBase.urlThumbnailBerita
      },
      berita: {
        isLoading: false,
        data: []
      },
      sort: {
        date: null,
        kategori: "all",
        subkategori: "all",
        subkategoriShow: false
      },
      kategori: [],
      subkategori: [],
      pickerOptions: {
        shortcuts: [
          {
            text: "minggu lalu",
            onClick(picker) {
              const end = new Date();
              const start = new Date();
              start.setTime(start.getTime() - 3600 * 1000 * 24 * 7);
              picker.$emit("pick", [start, end]);
            }
          },
          {
            text: "Bulan lalu",
            onClick(picker) {
              const end = new Date();
              const start = new Date();
              start.setTime(start.getTime() - 3600 * 1000 * 24 * 30);
              picker.$emit("pick", [start, end]);
            }
          },
          {
            text: "3 bulan lalu",
            onClick(picker) {
              const end = new Date();
              const start = new Date();
              start.setTime(start.getTime() - 3600 * 1000 * 24 * 90);
              picker.$emit("pick", [start, end]);
            }
          }
        ]
      }
    };
  },
  mounted() {
    console.log("inilahnews");
    this.getBerita();
    this.getKategori();
  },
  methods: {
    moment(arg) {
      moment.locale("id");
      return moment(arg);
    },
    getBerita() {
      axios
        .post(urlBase.urlWeb + "/master/berita", {
          type: "BeritaTrending"
        })
        .then(r => {
          console.log(r.data[1]);
          this.berita.data = r.data;
        });
    },
    sortBy() {
      axios
        .post(urlBase.urlWeb + "/master/berita", {
          type: "BeritaSort",
          sort: this.sort
        })
        .then(r => {
          this.berita.data = r.data;
        });
    },
    getKategori() {
      axios
        .post(urlBase.urlWeb + "/master/kategori", {
          type: "kategoriAll",
          date: this.sort.date
        })
        .then(r => {
          this.kategori = r.data;
          this.kategori.push({
            id_kategori: "all",
            nama_kategori: "all"
          });
        });
    },
    subgetKategori() {
      axios
        .post(urlBase.urlWeb + "/master/subkategori", {
          type: "subkategoriByKategori",
          sort: this.sort
        })
        .then(r => {
          this.subkategori = [];
          if (r.data.length) {
            this.subkategori = r.data;
            this.subkategori.push({
              id_subkategori: "all",
              nama_subkategori: "all"
            });
            this.sort.subkategoriShow = true;
          } else {
            this.sort.subkategoriShow = false;
          }
        });
    }
  }
};
</script>
<style scoped>
.judul {
  font-size: 14px;
  font-weight: bold;
  margin: 0px 0px 0px 0px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  text-transform: lowercase;
  height: 35px;
  line-height: 18px;
}
.is-kategori {
  font-size: 10px;
  margin: 0px !important;
}
.is-subkategori {
  font-size: 10px;
}
</style>