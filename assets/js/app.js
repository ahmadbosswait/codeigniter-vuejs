Vue.component('modal', { //modal
    template: `
  <transition enter-active-class="animated rollIn"
             leave-active-class="animated rollOut">
    <div class="modal is-active" >
    <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
<button class="delete" @click="$emit('close')"></button>
    </div>
    <div class="modal-card-body">
         <slot name="body"></slot>
    </div>
    <div class="modal-card-foot" >
      <slot name="foot"></slot>
    </div>
  </div>
</div>
</transition>
    `
});
var v = new Vue({
    el: '#app',
    data: {
        url: 'http://5x5.ir/',
        addModal: false,
        editModal: false,
        deleteModal: false,
        users: [],
        file_data: '',
        search: {text: ''},
        emptyResult: false,
        newUser: {
            firstname: '',
            lastname: '',
            gender: '',
            birthday: '',
            email: '',
            contact: '',
            address: '',
            fileupload: ''
        },
        chooseUser: {},
        formValidate: [],
        successMSG: '',

        //pagination
        currentPage: 0,
        rowCountPage: 20,
        totalUsers: 0,
        pageRange: 2
    },
    created() {
        this.showAll();
    },
    methods: {
        showAll() {
            axios.get(this.url + "api/user/showAll").then(function (response) {
                if (response.data.users == null) {
                    v.noResult()
                } else {
                    v.getData(response.data.users);
                }
            })
        },
        searchUser() {
            var formData = v.formData(v.search);
            axios.post(this.url + "api/user/searchUser", formData).then(function (response) {
                if (response.data.users == null) {
                    v.noResult()
                } else {
                    v.getData(response.data.users);

                }
            })
        },
        addUser() {
            this.file_data = $('#image').prop('files')[0];
            var formData = v.formData(v.newUser);
            formData.append('file', this.file_data);

            axios.post(this.url + "api/user/addUser", formData).then(function (response) {
                if (response.data.error) {
                    v.formValidate = response.data.msg;
                } else {
                    v.successMSG = response.data.msg;
                    console.log(response);
                    v.clearAll();
                    v.clearMSG();
                }
            })
        },
        updateUser() {
            var formData = v.formData(v.chooseUser);
            axios.post(this.url + "api/user/updateUser", formData).then(function (response) {
                if (response.data.error) {
                    v.formValidate = response.data.msg;
                } else {
                    v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();

                }
            })
        },
        deleteUser() {
            var formData = v.formData(v.chooseUser);
            axios.post(this.url + "api/user/deleteUser", formData).then(function (response) {
                if (!response.data.error) {
                    v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                }
            })
        },
        formData(obj) {
            var formData = new FormData();
            for (var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        getData(users) {
            v.emptyResult = false; // become false if has a record
            v.totalUsers = users.length //get total of user
            v.users = users.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination

            // if the record is empty, go back a page
            if (v.users.length == 0 && v.currentPage > 0) {
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();
            }
        },

        selectUser(user) {
            v.chooseUser = user;
        },
        clearMSG() {
            setTimeout(function () {
                v.successMSG = ''
            }, 3000); // disappearing message success in 2 sec
        },
        clearAll() {
            v.newUser = {
                firstname: '',
                lastname: '',
                gender: '',
                birthday: '',
                email: '',
                contact: '',
                address: ''
            };
            v.formValidate = false;
            v.addModal = false;
            v.editModal = false;
            v.deleteModal = false;
            v.refresh()

        },
        noResult() {

            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.users = null
            v.totalUsers = 0 //remove current page if is empty

        },

        pickGender(gender) {
            return v.newUser.gender = gender //add new user with selecting gender
        },
        changeGender(gender) {
            return v.chooseUser.gender = gender //update gender
        },
        imgGender(value) {
            return v.url + 'assets/img/gender_' + value + '.png' //for image gender sign in the table
        },
        imgUser(value) {
            return v.url + 'assets/upload/' + value //for image gender sign in the table
        },
        pageUpdate(pageNumber) {
            v.currentPage = pageNumber; //receive currentPage number came from pagination template
            v.refresh()
        },
        refresh() {
            v.search.text ? v.searchUser() : v.showAll(); //for preventing

        }
    }
});

// const Home = { }
// var Home = import('./components/Home.vue');
// console.log(Home);
// const User = {template: '<div>User</div>'};
// // const User = {template: '<div>User</div>'};
// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {path: '/civuejs/', component: Home},
//         {path: '/civuejs/users', component: User}
//     ]
// });
//
// var main_app = new Vue({
//     router,
//     el: '#main_app',
//     data: {
//         msg: 'Hello World'
//     }
// });

var image = new Vue({
    el: '#image_app',
    data: {
        images: {},
    },
    mounted() {
        this.fetchImages();
    },
    methods: {
        fetchImages() {
            let url = "http://5x5.ir/api/user/showAll";
            axios.get(url).then((res) => {
                this.images = res.data.users;
            });
        }
    }
});