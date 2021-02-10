module.exports = {
  configureWebpack: {
    devServer: {
      watchOptions: {
        poll: true
      }
    }
  },
  // css: {
  //   loaderOptions: {
  //     sass: {
  //       data: `@import "./../sass/variables.scss"`,
  //     },          options: {
  //       // This is the path to your variables
  //       prependData: "@import '@/styles/variables.scss'"
  //     },
  //   },
  // },
}