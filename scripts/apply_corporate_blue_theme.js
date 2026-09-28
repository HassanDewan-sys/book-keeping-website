const fs = require('fs');
const path = require('path');

// 1. Precise Hex Replacements Map
const HEX_MAP = [
    // Burgundy / Plum / Cabernet -> Deep Navy #12086F or Royal Blue
    { regex: /#14070D/gi, replace: '#12086F' },
    { regex: /#1F0C15/gi, replace: '#12086F' },
    { regex: /#11040A/gi, replace: '#12086F' },
    { regex: /#150610/gi, replace: '#12086F' },
    { regex: /#1C0B16/gi, replace: '#12086F' },
    { regex: /#180510/gi, replace: '#12086F' },
    { regex: /#1A0612/gi, replace: '#12086F' },
    { regex: /#300C1F/gi, replace: '#12086F' },
    { regex: /#32121E/gi, replace: '#12086F' },
    { regex: /#12060D/gi, replace: '#12086F' },
    { regex: /#180712/gi, replace: '#12086F' },
    { regex: /#1A0710/gi, replace: '#12086F' },
    { regex: /#2A0E1E/gi, replace: '#12086F' },
    { regex: /#260C1B/gi, replace: '#12086F' },
    { regex: /#2C101E/gi, replace: '#12086F' },
    { regex: /#3B142A/gi, replace: '#12086F' },
    { regex: /#3E152B/gi, replace: '#12086F' },
    { regex: /#3D152A/gi, replace: '#12086F' },
    { regex: /#060911/gi, replace: '#12086F' },
    { regex: /#551E3C/gi, replace: '#526079' }, // Muted text
    { regex: /#742952/gi, replace: '#4361EE' },

    // Dark blues / inks
    { regex: /#0D1527/gi, replace: '#17233D' },
    { regex: /#151F36/gi, replace: '#17233D' },
    { regex: /#0F172A/gi, replace: '#17233D' },
    { regex: /#1E293B/gi, replace: '#17233D' },

    // Brass / Gold / Copper -> Corporate Blue #2B35AF / Royal Blue #4361EE
    { regex: /#C98E5E/gi, replace: '#2B35AF' },
    { regex: /#8E562A/gi, replace: '#2B35AF' },
    { regex: /#B27747/gi, replace: '#2B35AF' },
    { regex: /#DFB28C/gi, replace: '#4895EF' },
    { regex: /#EED3BE/gi, replace: '#EDF2FF' },
    { regex: /#EEDBCE/gi, replace: '#EDF2FF' },
    { regex: /#F7E7DA/gi, replace: '#EDF2FF' },
    { regex: /#F3D9C3/gi, replace: '#EDF2FF' },
    { regex: /#DCA06B/gi, replace: '#4361EE' },
    { regex: /#B87640/gi, replace: '#2B35AF' },
    { regex: /#F5D2A4/gi, replace: '#4895EF' },
    { regex: /#D69E68/gi, replace: '#2B35AF' },
    { regex: /#B8763C/gi, replace: '#2B35AF' },
    { regex: /#955421/gi, replace: '#12086F' },
    { regex: /#D49B6A/gi, replace: '#2B35AF' },
    { regex: /#B86B35/gi, replace: '#2B35AF' },
    { regex: /#D8A070/gi, replace: '#4895EF' },
    { regex: /#E6B587/gi, replace: '#4895EF' },
    { regex: /#D4AF37/gi, replace: '#4361EE' },
    { regex: /#B88E18/gi, replace: '#4361EE' },
    { regex: /#926C08/gi, replace: '#2B35AF' },
    { regex: /#ECC870/gi, replace: '#4895EF' },
    { regex: /#F3E5AB/gi, replace: '#EDF2FF' },

    // Warm Creams / Canvas / Beige -> Clean Light Background #F5F7FC / Pale Blue #EDF2FF
    { regex: /#FAF6F0/gi, replace: '#F5F7FC' },
    { regex: /#FAF7F2/gi, replace: '#F5F7FC' },
    { regex: /#FAF9F6/gi, replace: '#F5F7FC' },
    { regex: /#F5EDE3/gi, replace: '#EDF2FF' },
    { regex: /#F5EBE1/gi, replace: '#EDF2FF' },
    { regex: /#F3ECE2/gi, replace: '#EDF2FF' },
    { regex: /#FBF9F4/gi, replace: '#F5F7FC' },
    { regex: /#F6EEE4/gi, replace: '#F5F7FC' },
    { regex: /#F1F5F9/gi, replace: '#F5F7FC' },
    { regex: /#E8DDD0/gi, replace: '#D9E2F2' },
    { regex: /#DFD7C6/gi, replace: '#D9E2F2' },
    { regex: /#E9E3D5/gi, replace: '#D9E2F2' },
    { regex: /#7A695B/gi, replace: '#526079' },

    // Green / Mint remnants
    { regex: /#0F5527/gi, replace: '#12086F' },
    { regex: /#1E8244/gi, replace: '#2B35AF' },
    { regex: /#06341A/gi, replace: '#12086F' },
    { regex: /#136632/gi, replace: '#2B35AF' },
    { regex: /#CFE8D6/gi, replace: '#EDF2FF' },
    { regex: /#ECF6EF/gi, replace: '#EDF2FF' },
    { regex: /#13291C/gi, replace: '#17233D' },
    { regex: /#E6F1E9/gi, replace: '#EDF2FF' },
    { regex: /#E0EDE3/gi, replace: '#EDF2FF' },
    { regex: /#F5F9F5/gi, replace: '#F5F7FC' },
    { regex: /#C69320/gi, replace: '#2B35AF' },
    { regex: /#E0B93A/gi, replace: '#4895EF' },
    { regex: /#A67C0C/gi, replace: '#12086F' },
    { regex: /#EAD188/gi, replace: '#EDF2FF' },
    { regex: /#FBF6E7/gi, replace: '#EDF2FF' },
    { regex: /#F5E9C2/gi, replace: '#EDF2FF' }
];

// 2. RGBA Replacements Map
const RGBA_MAP = [
    { regex: /rgba\(\s*201\s*,\s*142\s*,\s*94\s*,/g, replace: 'rgba(43, 53, 175,' },
    { regex: /rgba\(\s*220\s*,\s*160\s*,\s*105\s*,/g, replace: 'rgba(67, 97, 238,' },
    { regex: /rgba\(\s*20\s*,\s*7\s*,\s*13\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*20\s*,\s*6\s*,\s*14\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*31\s*,\s*12\s*,\s*21\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*62\s*,\s*22\s*,\s*38\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*58\s*,\s*20\s*,\s*36\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*50\s*,\s*18\s*,\s*30\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*18\s*,\s*6\s*,\s*13\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*16\s*,\s*5\s*,\s*12\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*14\s*,\s*4\s*,\s*10\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*24\s*,\s*7\s*,\s*18\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*28\s*,\s*10\s*,\s*20\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*142\s*,\s*86\s*,\s*42\s*,/g, replace: 'rgba(43, 53, 175,' },
    { regex: /rgba\(\s*180\s*,\s*100\s*,\s*45\s*,/g, replace: 'rgba(43, 53, 175,' },
    { regex: /rgba\(\s*180\s*,\s*110\s*,\s*60\s*,/g, replace: 'rgba(43, 53, 175,' },
    { regex: /rgba\(\s*180\s*,\s*130\s*,\s*90\s*,/g, replace: 'rgba(43, 53, 175,' },
    { regex: /rgba\(\s*184\s*,\s*107\s*,\s*53\s*,/g, replace: 'rgba(43, 53, 175,' },
    { regex: /rgba\(\s*212\s*,\s*155\s*,\s*106\s*,/g, replace: 'rgba(67, 97, 238,' },
    { regex: /rgba\(\s*212\s*,\s*175\s*,\s*55\s*,/g, replace: 'rgba(67, 97, 238,' },
    { regex: /rgba\(\s*245\s*,\s*205\s*,\s*130\s*,/g, replace: 'rgba(72, 149, 239,' },
    { regex: /rgba\(\s*230\s*,\s*175\s*,\s*125\s*,/g, replace: 'rgba(72, 149, 239,' },
    { regex: /rgba\(\s*238\s*,\s*211\s*,\s*190\s*,/g, replace: 'rgba(237, 242, 255,' },
    { regex: /rgba\(\s*240\s*,\s*222\s*,\s*206\s*,/g, replace: 'rgba(237, 242, 255,' },
    { regex: /rgba\(\s*255\s*,\s*238\s*,\s*180\s*,/g, replace: 'rgba(237, 242, 255,' },
    { regex: /rgba\(\s*255\s*,\s*238\s*,\s*220\s*,/g, replace: 'rgba(237, 242, 255,' },
    { regex: /rgba\(\s*250\s*,\s*246\s*,\s*240\s*,/g, replace: 'rgba(245, 247, 252,' },
    { regex: /rgba\(\s*232\s*,\s*221\s*,\s*208\s*,/g, replace: 'rgba(217, 226, 242,' },
    { regex: /rgba\(\s*44\s*,\s*16\s*,\s*30\s*,/g, replace: 'rgba(23, 35, 61,' },
    { regex: /rgba\(\s*198\s*,\s*147\s*,\s*32\s*,/g, replace: 'rgba(43, 53, 175,' },
    { regex: /rgba\(\s*30\s*,\s*130\s*,\s*68\s*,/g, replace: 'rgba(67, 97, 238,' },
    { regex: /rgba\(\s*15\s*,\s*85\s*,\s*39\s*,/g, replace: 'rgba(18, 8, 111,' },
    { regex: /rgba\(\s*6\s*,\s*52\s*,\s*26\s*,/g, replace: 'rgba(18, 8, 111,' }
];

function transformText(content) {
    let result = content;
    for (const item of HEX_MAP) {
        result = result.replace(item.regex, item.replace);
    }
    for (const item of RGBA_MAP) {
        result = result.replace(item.regex, item.replace);
    }
    return result;
}

// 3. Process PHP files in includes and components
function processPhpFiles() {
    const dirs = ['components', 'includes'];
    let modifiedCount = 0;

    for (const dir of dirs) {
        const fullDir = path.resolve(__dirname, '..', dir);
        if (!fs.existsSync(fullDir)) continue;

        const files = fs.readdirSync(fullDir).filter(f => f.endsWith('.php'));
        for (const file of files) {
            const filePath = path.join(fullDir, file);
            let content = fs.readFileSync(filePath, 'utf8');
            let original = content;

            // Transform hex & rgba
            content = transformText(content);

            // Replace border-radius classes with sharp/none
            content = content.replace(/\brounded-(?:full|3xl|2xl|xl|lg|md|sm|\d+px|\[[^\]]+\])\b/g, 'rounded-none');
            // Clean up standalone 'rounded' class
            content = content.replace(/\brounded\b(?![a-zA-Z0-9_-])/g, 'rounded-none');

            if (content !== original) {
                fs.writeFileSync(filePath, content, 'utf8');
                console.log(`Updated PHP file: ${dir}/${file}`);
                modifiedCount++;
            }
        }
    }
    console.log(`Total PHP files updated: ${modifiedCount}`);
}

// 4. Transform interactions.css
function processInteractionsCss() {
    const cssPath = path.resolve(__dirname, '../assets/css/interactions.css');
    let css = fs.readFileSync(cssPath, 'utf8');

    // Apply color replacements
    css = transformText(css);

    // Replace explicit border-radius rules with 0px
    css = css.replace(/border-radius:\s*[^;!]+(!important)?;/g, 'border-radius: 0px !important;');

    // Prepend strict Universal Zero Border Radius Reset and Token Definitions
    const strictReset = `/* ==========================================================================
   GLOBAL ZERO BORDER RADIUS & CORPORATE BLUE IDENTITY ENFORCEMENT
   Strict requirement: Every single UI component has 0px border radius.
   ========================================================================== */
*, *::before, *::after {
    border-radius: 0px !important;
}

:root {
    --color-navy: #12086F;
    --color-corporate-blue: #2B35AF;
    --color-royal-blue: #4361EE;
    --color-sky-blue: #4895EF;
    --color-cyan: #4CC9F0;
    
    --color-bg-light: #F5F7FC;
    --color-surface-pale: #EDF2FF;
    --color-card-white: #FFFFFF;
    --color-text-dark: #17233D;
    --color-text-muted: #526079;
    --color-border-subtle: #D9E2F2;

    /* Legacy mapping */
    --color-burgundy-950: #12086F;
    --color-burgundy-900: #12086F;
    --color-burgundy-850: #12086F;
    --color-burgundy-800: #12086F;
    --color-burgundy-700: #2B35AF;
    --color-burgundy-600: #4361EE;

    --color-brass-200: #EDF2FF;
    --color-brass-300: #D9E2F2;
    --color-brass-400: #4895EF;
    --color-brass-500: #4361EE;
    --color-brass-600: #2B35AF;
    --color-brass-700: #12086F;

    --color-surface-cashmere: #F5F7FC;
    --color-surface-card: #FFFFFF;
    --color-surface-muted: #EDF2FF;
    --color-border-warm: #D9E2F2;
}

body {
    background-color: #F5F7FC !important;
    color: #17233D !important;
}

body:before {
    background-image:
        radial-gradient(60% 50% at 82% -5%, rgba(67, 97, 238, 0.07), transparent 60%),
        radial-gradient(55% 45% at 8% 4%, rgba(43, 53, 175, 0.05), transparent 60%),
        linear-gradient(rgba(43, 53, 175, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(43, 53, 175, 0.03) 1px, transparent 1px) !important;
    background-size: auto, auto, 24px 24px, 24px 24px !important;
    opacity: 0.65 !important;
}

/* Hide corner lens flares that suggest rounded contours */
.bwp-flare {
    display: none !important;
}

/* Crisp rectangular buttons */
.btn-gold {
    background: #2B35AF !important;
    border: 1px solid #2B35AF !important;
    color: #FFFFFF !important;
    border-radius: 0px !important;
    box-shadow: 0 4px 14px rgba(43, 53, 175, 0.28) !important;
}
.btn-gold:hover {
    background: #4361EE !important;
    border-color: #4361EE !important;
    color: #FFFFFF !important;
    box-shadow: 0 8px 24px rgba(67, 97, 238, 0.38) !important;
}
.btn-ghost {
    background: #FFFFFF !important;
    border: 1.5px solid #2B35AF !important;
    color: #2B35AF !important;
    border-radius: 0px !important;
}
.btn-ghost:hover {
    background: #EDF2FF !important;
    border-color: #2B35AF !important;
    color: #12086F !important;
}
.btn-royal {
    background: #12086F !important;
    border: 1px solid #12086F !important;
    color: #FFFFFF !important;
    border-radius: 0px !important;
}
.btn-royal:hover {
    background: #2B35AF !important;
    border-color: #2B35AF !important;
    color: #FFFFFF !important;
}

/* Eyebrow square badge */
.eyebrow {
    background: #EDF2FF !important;
    border: 1px solid #D9E2F2 !important;
    color: #2B35AF !important;
    border-radius: 0px !important;
}

/* Scroll progress */
.scroll-progress-bar {
    background: linear-gradient(90deg, #4895EF, #4361EE 50%, #2B35AF) !important;
}

/* Scrollbars */
::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #4895EF 0%, #4361EE 50%, #2B35AF 100%) !important;
    border-radius: 0px !important;
}
\n`;

    css = strictReset + css;
    fs.writeFileSync(cssPath, css, 'utf8');
    console.log('Successfully updated assets/css/interactions.css');
}

// 5. Update assets/css/style.css
function processStyleCss() {
    const cssPath = path.resolve(__dirname, '../assets/css/style.css');
    let css = fs.readFileSync(cssPath, 'utf8');

    // Append universal zero-radius and corporate blue variables override to style.css
    const styleOverride = `
/* Universal Zero Radius & Corporate Blue Theme Override */
*, *::before, *::after {
    border-radius: 0px !important;
}
:root {
    --gold: #2B35AF;
    --gold-bright: #4361EE;
    --green: #12086F;
    --green-bright: #2B35AF;
    --cream: #F5F7FC;
    --ink: #17233D;
}
.rounded, .rounded-2xl, .rounded-3xl, .rounded-full, .rounded-lg, .rounded-xl, .rounded-md, .rounded-sm {
    border-radius: 0px !important;
}
.bg-cream { background-color: #F5F7FC !important; }
.text-ink { color: #17233D !important; }
.text-gold { color: #2B35AF !important; }
.bg-gold { background-color: #2B35AF !important; }
.btn-gold {
    border-radius: 0px !important;
    background: #2B35AF !important;
    color: #FFFFFF !important;
}
.btn-royal {
    border-radius: 0px !important;
    background: #12086F !important;
    color: #FFFFFF !important;
}
.btn-ghost {
    border-radius: 0px !important;
    border-color: #2B35AF !important;
    color: #2B35AF !important;
}
`;
    css += styleOverride;
    fs.writeFileSync(cssPath, css, 'utf8');
    console.log('Successfully updated assets/css/style.css');
}

processInteractionsCss();
processStyleCss();
processPhpFiles();
