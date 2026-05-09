const { spawnSync } = require("node:child_process");
const path = require("node:path");

const projectRoot = path.resolve(__dirname, "..");
const cliPath = path.resolve(
  projectRoot,
  "node_modules",
  ".bin",
  "tailwindcss",
);

const args = ["-i", "./src/input.css", "-o", "./dist/output.css"];
if (process.argv.includes("--watch")) {
  args.push("--watch");
}
if (process.argv.includes("--minify")) {
  args.push("--minify");
}

const result = spawnSync(cliPath, args, {
  cwd: projectRoot,
  stdio: "inherit",
  shell: process.platform === "win32",
});

process.exit(result.status ?? 1);
