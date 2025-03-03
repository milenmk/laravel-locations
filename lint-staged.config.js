export default {
  "**/*.php*": ["vendor/bin/duster fix"],
  "**/*": "prettier --write --ignore-unknown",
};
