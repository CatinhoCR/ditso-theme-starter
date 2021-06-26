const path = require('path')

module.exports = {
  THEME_NAME: 'ditso',
  HOST: 'ditso-catix.dev',
  BROWSER_SYNC_PORT: 3000,
  WEBPACK_DEV_SERVER_PORT: 8000,
  PATHS: {
    theme: unipath(path.resolve(__dirname, '..')),
    src: unipath(path.resolve(__dirname, '../src')),
    build: unipath(path.resolve(__dirname, '../build')),
  },
  HOMEDIR: require('os').homedir(),
}
// @todo env variables generic and easy to set

function unipath(base) {
  return function join(...args) {
    const ppaths = [base].concat(Array.from(args))
    return path.resolve(path.join.apply(null, ppaths))
  }
}
