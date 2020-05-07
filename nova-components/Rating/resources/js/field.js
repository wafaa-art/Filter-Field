Nova.booting((Vue, router, store) => {
  Vue.component('index-rating', require('./components/IndexField'))
  Vue.component('detail-rating', require('./components/DetailField'))
  Vue.component('form-rating', require('./components/FormField'))
})
