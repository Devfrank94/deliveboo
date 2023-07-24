import {reactive} from "vue";

export const store = reactive({
  showBackUp: false,

  apiUrl: 'http://127.0.0.1:8000/api/',
    restaurants: [],
    restaurantfilter:[],
    restaurant_backup:[],
    typologies_id:[],
    links: [],
    typologies: [],
    dishes: [],
    loaded: false,

})
