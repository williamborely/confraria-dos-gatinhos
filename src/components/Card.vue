<template>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <h5 class="card-title text-uppercase text-muted mb-0">{{ title }}</h5>
        <span class="h2 font-weight-bold mb-0">{{ subtitle }}</span>
      </div>
      <div class="col-auto">
        <div class="icon icon-shape text-white rounded-circle shadow gradient-red">
          {{icon}}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",
  props: {
    title: String,
    subtitle: Number,
    icon: String,
  },
};
</script>

<style scoped>
.icon{
    width: 3rem;
    height: 3rem;
}

.icon-shape {
        padding: 12px;
    text-align: center;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    border-radius: 50%;
}
</style>
