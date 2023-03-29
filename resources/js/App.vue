<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <router-link :to="{ name: 'Add' }" class="nav-link"
                            >Add Student Data</router-link
                        >
                    </li>
                    <li class="nav-item active">
                        <router-link :to="{ name: 'List'}" class="nav-link"
                            >Student List</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            :to="{ name: 'AddTeacher' }"
                            class="nav-link"
                            >Add Teacher</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            :to="{ name: 'TeacherList' }"
                            class="nav-link"
                            >Teacher List</router-link
                        >
                    </li>
                </ul>
            </div>
        </nav>

        <NotificationGroup group="error">
            <div
                class="fixed inset-0 flex items-start justify-end p-6 px-4 py-6 pointer-events-none"
            >
                <div class="w-full max-w-sm">
                    <Notification
                        v-slot="{ notifications }"
                        enter="transform ease-out duration-300 transition"
                        enter-from="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4"
                        enter-to="translate-y-0 opacity-100 sm:translate-x-0"
                        leave="transition ease-in duration-500"
                        leave-from="opacity-100"
                        leave-to="opacity-0"
                        move="transition duration-500"
                        move-delay="delay-300"
                    >
                        <div
                            class="flex w-full max-w-sm mx-auto mt-4 overflow-hidden bg-white rounded-lg shadow-md"
                            v-for="notification in notifications"
                            :key="notification.id"
                        >
                            <div class="alert alert-danger" role="alert">
                                <span class="font-semibold text-red-500">{{
                                    notification.title
                                }}</span>
                                <p class="text-sm text-gray-600">
                                    {{ notification.text }}
                                </p>
                            </div>
                        </div>
                    </Notification>
                </div>
            </div>
        </NotificationGroup>

        <NotificationGroup group="generic">
            <div
                class="fixed inset-0 flex items-start justify-end p-6 px-4 py-6 pointer-events-none"
            >
                <div class="w-full max-w-sm">
                    <Notification
                        v-slot="{ notifications }"
                        enter="transform ease-out duration-300 transition"
                        enter-from="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4"
                        enter-to="translate-y-0 opacity-100 sm:translate-x-0"
                        leave="transition ease-in duration-500"
                        leave-from="opacity-100"
                        leave-to="opacity-0"
                        move="transition duration-500"
                        move-delay="delay-300"
                    >
                        <div
                            class="flex w-full max-w-sm mx-auto mt-4 overflow-hidden bg-white rounded-lg shadow-md"
                            v-for="notification in notifications"
                            :key="notification.id"
                        >
                            <div class="alert alert-danger" role="alert">
                                <span class="font-semibold text-red-500">{{
                                    notification.title
                                }}</span>
                                <p class="text-sm text-gray-600">
                                    {{ notification.text }}
                                </p>
                            </div>
                        </div>
                    </Notification>
                </div>
            </div>
        </NotificationGroup>
        <NotificationGroup group="foo">
            <div
                class="fixed inset-0 flex items-start justify-end p-6 px-4 py-6 pointer-events-none"
            >
                <div class="w-full max-w-sm">
                    <Notification
                        v-slot="{ notifications }"
                        enter="transform ease-out duration-300 transition"
                        enter-from="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4"
                        enter-to="translate-y-0 opacity-100 sm:translate-x-0"
                        leave="transition ease-in duration-500"
                        leave-from="opacity-100"
                        leave-to="opacity-0"
                        move="transition duration-500"
                        move-delay="delay-300"
                    >
                        <div
                            class="flex w-full max-w-sm mx-auto mt-4 overflow-hidden bg-white rounded-lg shadow-md"
                            v-for="notification in notifications"
                            :key="notification.id"
                        >
                            <div class="alert alert-success" role="alert">
                                <span class="font-semibold text-green-500">{{
                                    notification.title
                                }}</span>
                                <p class="text-sm text-gray-600">
                                    {{ notification.text }}
                                </p>
                            </div>
                        </div>
                    </Notification>
                </div>
            </div>
        </NotificationGroup>

        <router-view></router-view>
    </div>
</template>
<script>
export default {};
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
