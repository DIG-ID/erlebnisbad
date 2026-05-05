/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './inc/**/*.php',
    './page-templates/**/*.php',
    './template-parts/**/*.php',
  ],
  theme: {
    fontFamily: {
      raleway: ['raleway', 'sans-serif'],
      openSans: ['open-sans', 'sans-serif'],
      dmSans: ['dm-sans', 'sans-serif'],
    },

    extend: {
      letterSpacing: {
        // wide: '.038em',
        // wider: '.06em',
      },
      colors: {
        // Brand palette
        'Mint1': '#BCEBDF',
        'Mint2': '#A1DBD0',
        'Mint3': '#96DAC8',
        'Mint': '#66C2B0',
        'DarkGreen': '#0C3B38',
        'Black': '#131313',
        'Red': '#E02E52',
        // UI / functional
        'Dark': '#25211E',
        'Brown': '#766A66',
        'LightGray': '#E7E5E5',
        'OffWhite': '#F3F3F3',
        'BgLight': '#F0F0F0',
      },
      transitionTimingFunction: {
        'out-expo': 'cubic-bezier(0.16, 1, 0.3, 1)',
      },
      gridTemplateRows: {
        masonry: 'masonry',
      },
    },
  },
  plugins: [],
};
