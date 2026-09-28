const http = require('http');
const fs = require('fs');
const path = require('path');
const { spawn } = require('child_process');

class CDPClient {
    constructor(wsUrl) {
        this.ws = new WebSocket(wsUrl);
        this.id = 1;
        this.callbacks = new Map();
        this.ready = new Promise((resolve, reject) => {
            this.ws.onopen = resolve;
            this.ws.onerror = reject;
        });
        this.ws.onmessage = (event) => {
            const data = JSON.parse(event.data);
            if (data.id && this.callbacks.has(data.id)) {
                const cb = this.callbacks.get(data.id);
                this.callbacks.delete(data.id);
                if (data.error) cb.reject(new Error(data.error.message));
                else cb.resolve(data.result);
            }
        };
    }

    send(method, params = {}) {
        return new Promise((resolve, reject) => {
            const msgId = this.id++;
            this.callbacks.set(msgId, { resolve, reject });
            this.ws.send(JSON.stringify({ id: msgId, method, params }));
        });
    }

    close() {
        this.ws.close();
    }
}

async function run() {
    const port = 9444;
    const edgePath = 'C:\\Program Files (x86)\\Microsoft\\Edge\\Application\\msedge.exe';
    const tempProfile = path.join(process.env.TEMP, 'edge_cdp_profile_' + Date.now());

    console.log('Launching Edge for CDP capture...');
    const edgeProc = spawn(edgePath, [
        '--headless=new',
        `--remote-debugging-port=${port}`,
        `--user-data-dir=${tempProfile}`,
        '--no-first-run',
        '--no-default-browser-check',
        'http://127.0.0.1:8000/'
    ]);

    await new Promise(r => setTimeout(r, 2500));

    function getJson(url) {
        return new Promise((resolve, reject) => {
            http.get(url, res => {
                let data = '';
                res.on('data', chunk => data += chunk);
                res.on('end', () => resolve(JSON.parse(data)));
            }).on('error', reject);
        });
    }

    try {
        const pages = await getJson(`http://127.0.0.1:${port}/json`);
        console.log(`Found ${pages.length} pages`);
        const page = pages.find(p => p.type === 'page') || pages[0];
        const client = new CDPClient(page.webSocketDebuggerUrl);
        await client.ready;
        console.log('Connected to CDP');

        await client.send('Page.enable');
        await client.send('DOM.enable');
        await client.send('CSS.enable');

        // Wait for fonts and scripts to settle
        await new Promise(r => setTimeout(r, 2000));

        const artifactsDir = 'C:\\Users\\Rrs computers\\.gemini\\antigravity\\brain\\9d7f4271-d0d3-4cb5-b128-4cb56dc78eae';

        // 1. Programmatic Border Radius Audit
        const radiusCheck = await client.send('Runtime.evaluate', {
            expression: `(() => {
                const sampleSelectors = [
                    '#main-header',
                    '.bwp-navbar',
                    '.bwp-topbar',
                    '.btn-gold',
                    '.btn-ghost',
                    '.btn-royal',
                    '.eyebrow',
                    '.card-cashmere',
                    '.footer-cta-card',
                    '.footer-brand-panel',
                    '.footer-btn-primary',
                    '.footer-subfooter-pill',
                    '.hero-nav-arrow',
                    '.hero-book'
                ];
                const results = [];
                for (const sel of sampleSelectors) {
                    const el = document.querySelector(sel);
                    if (el) {
                        const style = window.getComputedStyle(el);
                        results.push({ selector: sel, borderRadius: style.borderRadius });
                    }
                }
                return JSON.stringify(results);
            })()`
        });
        console.log('Border Radius Verification:', radiusCheck.result.value);

        // 2. Capture Desktop 1440px
        await client.send('Emulation.setDeviceMetricsOverride', {
            width: 1440,
            height: 900,
            deviceScaleFactor: 1,
            mobile: false
        });
        await new Promise(r => setTimeout(r, 1000));
        let shot = await client.send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactsDir, 'verified_desktop_1440.png'), Buffer.from(shot.data, 'base64'));
        console.log('Saved verified_desktop_1440.png');

        // 3. Capture Tablet 1024px
        await client.send('Emulation.setDeviceMetricsOverride', {
            width: 1024,
            height: 768,
            deviceScaleFactor: 1,
            mobile: false
        });
        await new Promise(r => setTimeout(r, 800));
        shot = await client.send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactsDir, 'verified_tablet_1024.png'), Buffer.from(shot.data, 'base64'));
        console.log('Saved verified_tablet_1024.png');

        // 4. Capture Mobile 390px (iPhone 14/15)
        await client.send('Emulation.setDeviceMetricsOverride', {
            width: 390,
            height: 844,
            deviceScaleFactor: 2,
            mobile: true
        });
        await new Promise(r => setTimeout(r, 800));
        shot = await client.send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactsDir, 'verified_mobile_390.png'), Buffer.from(shot.data, 'base64'));
        console.log('Saved verified_mobile_390.png');

        // 5. Scroll down to Covers In Motion 3D carousel
        await client.send('Emulation.setDeviceMetricsOverride', {
            width: 1440,
            height: 900,
            deviceScaleFactor: 1,
            mobile: false
        });
        await client.send('Runtime.evaluate', {
            expression: `document.getElementById('covers-motion')?.scrollIntoView({ behavior: 'instant' });`
        });
        await new Promise(r => setTimeout(r, 1200));
        shot = await client.send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactsDir, 'verified_covers_motion.png'), Buffer.from(shot.data, 'base64'));
        console.log('Saved verified_covers_motion.png');

        // Free Mockup section
        await client.send('Runtime.evaluate', {
            expression: `document.getElementById('free-mockup')?.scrollIntoView({ behavior: 'instant' });`
        });
        await new Promise(r => setTimeout(r, 800));
        shot = await client.send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactsDir, 'verified_free_mockup.png'), Buffer.from(shot.data, 'base64'));
        console.log('Saved verified_free_mockup.png');

        // 6. Scroll down to Packages and Footer
        await client.send('Runtime.evaluate', {
            expression: `document.getElementById('packages')?.scrollIntoView({ behavior: 'instant' });`
        });
        await new Promise(r => setTimeout(r, 800));
        shot = await client.send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactsDir, 'verified_packages_section.png'), Buffer.from(shot.data, 'base64'));
        console.log('Saved verified_packages_section.png');

        await client.send('Runtime.evaluate', {
            expression: `document.querySelector('footer')?.scrollIntoView({ behavior: 'instant' });`
        });
        await new Promise(r => setTimeout(r, 800));
        shot = await client.send('Page.captureScreenshot', { format: 'png' });
        fs.writeFileSync(path.join(artifactsDir, 'verified_footer_section.png'), Buffer.from(shot.data, 'base64'));
        console.log('Saved verified_footer_section.png');

        client.close();
    } catch (err) {
        console.error('CDP Error:', err);
    } finally {
        edgeProc.kill();
        try { fs.rmSync(tempProfile, { recursive: true, force: true }); } catch (e) {}
    }
}

run();
