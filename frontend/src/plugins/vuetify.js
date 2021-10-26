import Vue from 'vue';
import Vuetify from 'vuetify/lib';

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        themes: {
            dark: {
                primary: '#253628',
                secondary: '#49654C',
                accent: '#8AA989',
                error: '#C0CEB2',
                info: '#E3E6DA',
                success: '#EBEBE9',
                warning: '#FFC107',
            },
            light: {
                primary: '#253628',
                secondary: '#49654C',
                accent: '#8AA989',
                error: '#C0CEB2',
                info: '#E3E6DA',
                success: '#EBEBE9',
                warning: '#ff8080'
            }
        }
    },

    breakpoint: {
        thresholds: {
            xs: 340,
            sm: 540,
            md: 800,
            lg: 1280,
        }
    }
});
