<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #eae9e9 !important;">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/book" class="nav-item nav-link">Home</router-link>
                    <router-link to="/book/add" class="nav-item nav-link">Add</router-link>
                    <router-link to="/file/upload" class="nav-item nav-link">Upload</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {}
</script>
