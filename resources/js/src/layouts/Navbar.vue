<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                      <router-link to="/" tag="b-nav-item">
                        Home
                    </router-link>
                    <router-link to="/create" tag="b-nav-item">
                        Product
                    </router-link>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
export default {
    name: "Navbar",
};
</script>
