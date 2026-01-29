import os
import json

# === CONFIGURATION ===
ROOT_DIR = '.'          # Root folder to scan
OUTPUT_FILE = 'tree.php'  # Output file
IGNORE_DIRS = {'.git', 'node_modules', 'vendor', '__pycache__'}  # Folders to ignore

# Get project name dynamically (use folder name)
PROJECT_NAME = os.path.basename(os.path.abspath(ROOT_DIR))

# === HTML TEMPLATE ===
HTML_TEMPLATE = """
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{project_name} - Project Tree</title>
<style>
body {{ font-family: Poppins; background: #f7f8fb; color: #0e1b3d; padding: 20px; }}
h1 {{ color: #0e1b3d; }}
ul.tree {{ list-style: none; padding-left: 20px; }}
ul.tree li {{ margin: 2px 0; position: relative; }}
ul.tree li::before {{ content: ""; position: absolute; top: 12px; left: -12px; border-left: 1px solid #555; height: 100%; }}
ul.tree li::after {{ content: ""; position: absolute; top: 12px; left: -12px; border-top: 1px solid #555; width: 12px; }}
ul.tree li:last-child::before {{ height: 12px; }}
.folder, .file {{ display: inline-block; padding: 2px 6px; border-radius: 4px; }}
.folder {{ color: #f88325; font-weight: 600; cursor: pointer; }}
a.file {{ color: #4169e1; text-decoration: none; }}
.file {{ color: #b5b5b5; }}
.nested {{ display: none; margin-left: 20px; }}
.active {{ display: block; }}
.icon {{ margin-right: 5px; }}
a.file:hover {{ text-decoration: none; }}
</style>
</head>
<body>
<h1>{project_name} - Project Folder Tree</h1>
<ul class="tree" id="tree-root"></ul>

<script>
const treeData = {tree_json};

function createNode(node, level=0) {{
    const li = document.createElement('li');

    if(node.type === 'dir') {{
        const span = document.createElement('span');
        span.className = 'folder';
        span.innerHTML = '<span class="icon">📁</span>' + node.name;
        li.appendChild(span);

        const ul = document.createElement('ul');
        ul.className = 'nested';

        if(node.children) {{
            node.children.forEach(child => ul.appendChild(createNode(child, level + 1)));
        }}

        // Expand first level by default
        if(level < 1) {{
            ul.classList.add('active');
        }}

        li.appendChild(ul);

        span.addEventListener('click', () => {{
            ul.classList.toggle('active');
        }});
    }} else {{
        const isPage = /\.(php|html|htm)$/i.test(node.name);

        if (isPage) {{
            const link = document.createElement('a');
            link.className = 'file';
            link.href = node.path;
            link.innerHTML = '<span class="icon">📄</span>' + node.name;
            link.target = '_blank'; // Remove if you want same tab
            // Highlight current page
            if (window.location.pathname.endsWith(node.path)) {{
                link.style.fontWeight = '700';
                link.style.color = '#f88325';
            }}
            li.appendChild(link);
        }} else {{
            const span = document.createElement('span');
            span.className = 'file';
            span.innerHTML = '<span class="icon">📄</span>' + node.name;
            li.appendChild(span);
        }}
    }}

    return li;
}}

const treeRoot = document.getElementById('tree-root');
treeRoot.appendChild(createNode(treeData));
</script>
</body>
</html>
"""

# === FUNCTION TO BUILD TREE JSON ===
def build_tree(path, root=ROOT_DIR):
    rel_path = os.path.relpath(path, root).replace("\\", "/")

    node = {
        "name": "root" if path == root else os.path.basename(path),
        "type": "dir" if os.path.isdir(path) else "file",
        "path": rel_path
    }

    if os.path.isdir(path):
        node["children"] = []
        for child in sorted(os.listdir(path)):
            if child in IGNORE_DIRS:
                continue
            node["children"].append(build_tree(os.path.join(path, child), root))

    return node

# === BUILD TREE AND WRITE FILE ===
tree_json = build_tree(ROOT_DIR)

with open(OUTPUT_FILE, 'w', encoding='utf-8') as f:
    f.write(HTML_TEMPLATE.format(
        tree_json=json.dumps(tree_json, indent=2),
        project_name=PROJECT_NAME
    ))

print(f"{OUTPUT_FILE} generated successfully! Open it in your browser.")
