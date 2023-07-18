import {createRouter,createWebHistory} from "vue-router";
import StudentAdd from "../component/student/AddStudent.vue";
import StudentList from "../component/student/StudentList.vue";
import StudentEdit from "../component/student/StudentEdit.vue";
import TeacherAdd from "../component/teacher/AddTeacher.vue";
import TeacherList from "../component/teacher/TeacherList.vue";
import TeacherEdit from "../component/teacher/EditTeacher.vue";


const routes = [
        {
            path: '/',
            name:'List',
            component: StudentList,
        },
        {
            path: '/add-data',
            name:'Add',
            component: StudentAdd,
        },
        {
            path: '/edit-student/:id',
            name:'StudentEdit',
            component: StudentEdit,
        },
        {
            path:'/add-teacher-data',
            name:'AddTeacher',
            component:TeacherAdd,
        },
        {
            path:'/teacher-list',
            name:'TeacherList',
            component:TeacherList,
        },
        {
            path:'/teacher-edit/:id',
            name:'TeacherEdit',
            component:TeacherEdit,
        }



]

const router = createRouter({
    history: createWebHistory(),
    routes,
  });

  export default router;

