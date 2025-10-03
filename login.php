<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>SoftCode Pro — Sign In / Sign Up</title>

  <!-- Inter font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome (icons) -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    rel="stylesheet"
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <style>
    :root{
      --primary: #2563eb;          /* blue-600 */
      --primary-600: #0d1744;       /* blue-700 */
      --primary-500: #3b82f6;       /* blue-500 */
      --txt: #eaf1ff;
      --muted: #292929;
      --card-bg: rgba(255,255,255,0.08);
      --card-stroke: rgba(255,255,255,0.22);
      --input-bg: rgba(255,255,255,0.12);
      --input-stroke: rgba(97, 97, 97, 0.459);
      --shadow: 0 20px 50px rgba(0,0,0,0.45);
      --success: #22c55e;
      --danger: #ef4444;
    }

    /* Reset + base */
    * { box-sizing: border-box; }
    html, body {
      height: 100%;
    }
    body{
      margin: 0;
      font-family: "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      color: var(--txt);
      background: #0b1020;
      /* Background image with gradient overlay */
      background-image:
        radial-gradient(1200px 800px at 10% -10%, rgba(37,99,235,0.35), rgba(37,99,235,0) 60%),
        radial-gradient(900px 600px at 110% 110%, rgba(99,102,241,0.25), rgba(99,102,241,0) 60%),
        url('images/loginbg.png');
      background-size: cover, cover, cover;
      background-position: center, center, center;
      background-attachment: fixed, fixed, fixed;
      overflow: hidden;
    }

    /* Subtle animated gradient haze */
    .bg-haze {
      position: fixed;
      inset: -10%;
      background:
        radial-gradient(600px 600px at 20% 30%, rgba(59,130,246,0.18), transparent 60%),
        radial-gradient(700px 700px at 80% 70%, rgba(99,102,241,0.16), transparent 65%);
      filter: saturate(120%);
      animation: hazeFloat 14s ease-in-out infinite alternate;
      pointer-events: none;
    }
    @keyframes hazeFloat {
      from { transform: translateY(-10px); opacity: 0.9; }
      to   { transform: translateY(10px); opacity: 1; }
    }

    /* Center wrapper */
    .auth-wrapper{
      min-height: 100%;
      display: grid;
      place-items: center;
      padding: clamp(16px, 3vw, 40px);
      position: relative;
      z-index: 1;
    }

    /* Glass card */
    .auth-card{
      width: min(920px, 100%);
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0;
      border-radius: 24px;
      background: var(--card-bg);
      border: 1px solid var(--card-stroke);
      backdrop-filter: blur(18px) saturate(125%);
      -webkit-backdrop-filter: blur(18px) saturate(125%);
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    /* Left visual pane */
    .auth-visual{
      position: relative;
      display: none; /* hidden on mobile */
      background:
        radial-gradient(800px 600px at 30% 20%, rgba(37,99,235,0.25), rgba(37,99,235,0) 70%),
        linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02));
      padding: clamp(24px, 3vw, 36px);
    }
    .brand{
      display: flex;
      align-items: center;
      gap: 12px;
      color: var(--primary-500);
      opacity: 0.95;
      font-weight: 600;
      letter-spacing: 0.2px;
    }
    .brand .logo{
      width: 80px; height: 80px;
      display: grid; place-items: center;
      border-radius: 12px;
    }
    .brand .logo img{
      width: 68px;
      height: 68px;
      object-fit: contain;
      display: block;
    }
    .visual-copy{
      margin-top: clamp(24px, 3vw, 36px);
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .visual-copy h2{
      margin: 0 0 10px 0;
      font-size: clamp(26px, 2.2vw, 30px);
      letter-spacing: 0.2px;
      font-weight: 900;
      color: #0b1020;
    }
    .visual-copy p{
      margin: 0;
      color: var(--muted);
      line-height: 1.6;
      font-size: 14.5px;
    }
    .visual-footer{
      position: absolute;
      left: 0; right: 0; bottom: 0;
      padding: clamp(18px, 3vw, 24px);
      font-size: 12.5px;
      color: var(--muted);
      opacity: 0.9;
    }

    /* Right form pane */
    .auth-form{
      padding: clamp(22px, 3vw, 36px);
      position: relative;
      background: linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.01));
    }

    /* Tabs */
    .tabs{
      display: flex;
      gap: 8px;
      border: 1px solid var(--card-stroke);
      background: rgba(255,255,255,0.06);
      border-radius: 12px;
      padding: 6px;
      width: max-content;
      position: relative;
    }
    .tab{
      position: relative;
      z-index: 1;
      padding: 10px 16px;
      border-radius: 8px;
      cursor: pointer;
      color: var(--muted);
      font-weight: 600;
      font-size: 14px;
      user-select: none;
      transition: color .25s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .tab.active{ color: var(--txt); }
    .tab-underline{
      position: absolute;
      top: 6px; bottom: 6px;
      width: calc(50% - 6px);
      border-radius: 8px;
      background: linear-gradient(135deg, rgba(23, 109, 248, 0.801), rgba(7, 53, 206, 0.76));
      border: 1px solid rgba(255, 255, 255, 0.664);
      box-shadow: inset 0 0 0 1px rgba(255,255,255,0.08), 0 8px 20px rgba(37,99,235,0.25);
      transform: translateX(6px);
      transition: transform .35s cubic-bezier(.25,.8,.25,1);
    }
    .tabs.signup .tab-underline{
      transform: translateX(calc(100% + 6px));
    }

    .form-wrapper{
      margin-top: 22px;
      position: relative;
      min-height: 380px;
    }
    .form-panel{
      position: absolute;
      inset: 0;
      opacity: 0;
      transform: translateY(10px);
      pointer-events: none;
      transition: opacity .28s ease, transform .28s ease;
    }
    .form-panel.active{
      opacity: 1;
      transform: translateY(0);
      pointer-events: auto;
    }

    /* Scrollable Sign Up panel */
    .auth-form{ max-height: 85vh; overflow: hidden; }
    .form-wrapper{ max-height: calc(85vh - 90px); }
    #panel-signup.form-panel{ overflow-y: auto; padding-right: 6px; }
    #panel-signup .form-grid{ padding-bottom: 16px; }

    .form-title{
      margin: 8px 0 18px;
      font-size: 22px;
      letter-spacing: .2px;
      color: var(--primary-600);
    }

    .form-grid{
      display: grid;
      gap: 14px;
    }
    .form-row.two{
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    /* Inputs */
    .input{
      position: relative;
    }
    .input label{
      display: block;
      font-size: 12.5px;
      color: var(--muted);
      margin-bottom: 6px;
    }
    .input .control{
      width: 100%;
      height: 44px;
      padding: 10px 12px 10px 40px;
      border-radius: 12px;
      border: 1px solid var(--input-stroke);
      background: var(--input-bg);
      color: var(--muted);
      outline: none;
      transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
    }
    /* Make multi-line fields comfortable */
    .input textarea.control{
      height: auto;
      min-height: 96px;
      line-height: 1.45;
      resize: vertical;
      padding-top: 12px;
      padding-bottom: 12px;
    }
    .input select.control{
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background-image: linear-gradient(45deg, transparent 50%, rgba(234,241,255,0.7) 50%),
                        linear-gradient(135deg, rgba(234,241,255,0.7) 50%, transparent 50%);
      background-position: right 14px top 18px, right 8px top 18px;
      background-size: 6px 6px, 6px 6px;
      background-repeat: no-repeat;
      padding-right: 34px;
      cursor: pointer;
    }
    .input .control::placeholder{ color: rgba(59, 59, 59, 0.863); }
    .input .control:focus{
      border-color: rgba(59,130,246,0.6);
      box-shadow: 0 0 0 4px rgba(37,99,235,0.18);
      background: rgba(255,255,255,0.14);
    }
    .input .icon{
      position: absolute; left: 12px; top: 70%; transform: translateY(-50%);
      color: var(--muted);
      pointer-events: none;
    }
    .input .toggle-password{
      position: absolute; right: 10px; top: 70%; transform: translateY(-50%);
      color: var(--muted);
      background: none; border: none; cursor: pointer;
      width: 34px; height: 34px; border-radius: 8px;
    }
    .input .toggle-password:hover{ color: var(--txt); background: rgba(255,255,255,0.08); }

    /* Helpers */
    .row-between{
      display: flex; align-items: center; justify-content: space-between;
      gap: 8px;
      margin-top: 8px;
    }
    .checkbox{
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 13px; color: var(--muted);
      user-select: none;
    }
    .checkbox input{
      width: 18px; height: 18px; border-radius: 6px;
      appearance: none; -webkit-appearance: none;
      background: var(--input-bg);
      border: 1px solid var(--input-stroke);
      display: grid; place-items: center;
      transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
    }
    .checkbox input:focus{
      outline: none;
      border-color: rgba(59,130,246,0.6);
      box-shadow: 0 0 0 4px rgba(37,99,235,0.18);
    }
    .checkbox input:checked{
      background: linear-gradient(135deg, var(--primary-500), var(--primary));
      border-color: rgba(255,255,255,0.5);
    }
    .checkbox input:checked::after{
      content: "\f00c"; font-family: "Font Awesome 6 Free"; font-weight: 900; color: white; font-size: 12px;
    }

    .link{
      color: var(--primary-500);
      opacity: 0.9;
      text-decoration: none;
      font-size: 13px;
    }
    .link:hover{ opacity: 1; text-decoration: underline; }

    /* CTA button */
    .btn{
      display: inline-flex; align-items: center; justify-content: center;
      height: 46px; padding: 0 16px; width: 100%;
      border-radius: 12px; border: 0; cursor: pointer;
      color: white; font-weight: 600; letter-spacing: .3px;
      background: linear-gradient(135deg, var(--primary-500), var(--primary));
      box-shadow: 0 10px 28px rgba(37,99,235,0.35), inset 0 1px 0 rgba(255,255,255,0.15);
      transition: transform .06s ease, box-shadow .2s ease, filter .2s ease;
    }
    .btn:hover{ filter: brightness(1.03); box-shadow: 0 12px 34px rgba(37,99,235,0.42); }
    .btn:active{ transform: translateY(1px); }

    .note{
      margin-top: 14px;
      font-size: 12.5px; color: var(--muted);
      text-align: center;
    }

    /* Footer mini */
    .mini{
      margin-top: 18px;
      color: var(--muted);
      font-size: 12px;
      text-align: center;
    }

    /* Responsive */
    @media (min-width: 900px){
      .auth-visual{ display: block; }
      /* Move card to the right on desktop */
      .auth-wrapper{ justify-items: end; }
    }
    @media (max-width: 899.98px){
      .auth-card{ grid-template-columns: 1fr; }
      /* Re-center on mobile */
      .auth-wrapper{ justify-items: center; }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce){
      *{ animation: none !important; transition: none !important; }
    }
  </style>
</head>
<body>
  <div class="bg-haze" aria-hidden="true"></div>

  <main class="auth-wrapper" role="main">
    <section class="auth-card" aria-label="Authentication">
      <!-- Visual area (left on desktop) -->
      <aside class="auth-visual" aria-hidden="true">
        <div class="brand">
          <div class="logo"><img src="images/logo.png" alt="SoftCode Pro logo"></div>
          SoftCode Pro
        </div>
        <div class="visual-copy">
          <h2>Welcome back</h2>
          <p>Sign in to continue or create a new account to get started. Beautiful, fast, and secure — designed with modern glassmorphism aesthetics.</p>
        </div>
        <div class="visual-footer">Tip: Use the tabs to switch between Sign In and Sign Up.</div>
      </aside>

      <!-- Form area -->
      <div class="auth-form">
        <!-- Tabs -->
        <div class="tabs" id="tabs" role="tablist" aria-label="Choose form">
          <div class="tab active" id="tab-signin" role="tab" aria-selected="true" aria-controls="panel-signin" tabindex="0">
            <i class="fa-solid fa-right-to-bracket"></i> Sign In
          </div>
          <div class="tab" id="tab-signup" role="tab" aria-selected="false" aria-controls="panel-signup" tabindex="-1">
            <i class="fa-solid fa-user-plus"></i> Sign Up
          </div>
          <div class="tab-underline" aria-hidden="true"></div>
        </div>

        <div class="form-wrapper">
          <!-- Sign In Panel -->
          <section class="form-panel active" id="panel-signin" role="tabpanel" aria-labelledby="tab-signin">
            <h3 class="form-title">Welcome back</h3>
            <form id="form-signin" class="form-grid" novalidate>
              <div class="input">
                <label for="signin-email">Email</label>
                <i class="fa-regular fa-envelope icon"></i>
                <input id="signin-email" class="control" type="email" placeholder="you@example.com" autocomplete="email" required />
              </div>

              <div class="input">
                <label for="signin-password">Password</label>
                <i class="fa-solid fa-lock icon"></i>
                <input id="signin-password" class="control" type="password" placeholder="••••••••" autocomplete="current-password" required />
                <button type="button" class="toggle-password" aria-label="Show password" data-target="signin-password">
                  <i class="fa-regular fa-eye"></i>
                </button>
              </div>

              <div class="row-between">
                <label class="checkbox">
                  <input type="checkbox" id="remember" />
                  Remember me
                </label>
                <a href="#" class="link">Forgot password?</a>
              </div>

              <button class="btn" type="submit">
                <i class="fa-solid fa-right-to-bracket" style="margin-right:10px;"></i>
                Sign In
              </button>

              <div class="note">Don’t have an account? Switch to  <a href="#" class="link">Sign Up</a>.</div>
            </form>
          </section>

          <!-- Sign Up Panel -->
          <section class="form-panel" id="panel-signup" role="tabpanel" aria-labelledby="tab-signup" hidden>
          <h3 class="form-title">Create your account</h3>
          <form id="form-signup" class="form-grid" novalidate>
            <!-- Basic Info -->
            <div class="form-row two">
              <div class="input">
                <label for="client_name">Client name</label>
                <i class="fa-regular fa-user icon"></i>
                <input id="client_name" class="control" type="text" placeholder="Jane Smith" autocomplete="name" required />
              </div>
              <div class="input">
                <label for="company_name">Company name</label>
                <i class="fa-regular fa-building icon"></i>
                <input id="company_name" class="control" type="text" placeholder="Acme Ltd (optional)" autocomplete="organization" />
              </div>
              <div class="input">
                <label for="assigned_account_manager">Company Job Role</label>
                <i class="fa-regular fa-id-badge icon"></i>
                <input id="assigned_account_manager" class="control" type="text" placeholder="Manager (optional)" />
              </div>
            </div>

            <div class="form-row two">
              <div class="input">
                <label for="signup-email">Email address</label>
                <i class="fa-regular fa-envelope icon"></i>
                <input id="signup-email" class="control" type="email" placeholder="you@example.com" autocomplete="email" required />
              </div>
              <div class="input">
                <label for="phone_number">Phone number</label>
                <i class="fa-solid fa-phone icon"></i>
                <input id="phone_number" class="control" type="tel" placeholder="0771234567" autocomplete="tel" />
              </div>
            </div>

            <div class="form-row two">
              <div class="input">
                <label for="whatsapp_number">WhatsApp number</label>
                <i class="fa-brands fa-whatsapp icon"></i>
                <input id="whatsapp_number" class="control" type="tel" placeholder="0771234567" />
              </div>

              <div class="input">
                <label for="preferred_communication">Preferred communication</label>
                <i class="fa-regular fa-message icon"></i>
                <select id="preferred_communication" class="control">
                  <option value="" selected disabled>Select…</option>
                  <?php
                    require_once __DIR__ . '/connection/connection.php';
                    $rs_pc = Database::search("SELECT pre_id, preferred_communication FROM preferred_communication ORDER BY preferred_communication ASC");
                    if ($rs_pc) {
                      while ($row = $rs_pc->fetch_assoc()) {
                        $id = htmlspecialchars($row['pre_id'], ENT_QUOTES, 'UTF-8');
                        $label = htmlspecialchars($row['preferred_communication'], ENT_QUOTES, 'UTF-8');
                        echo "<option value=\"$id\">$label</option>";
                      }
                    }
                  ?>
                </select>
              </div>
              
            </div>

            <!-- Addresses -->
            <div class="input">
              <label for="billing_address">Billing address</label>
              <i class="fa-regular fa-map icon"></i>
              <input id="billing_address" class="control" type="text" placeholder="Street, City" autocomplete="billing street-address" />
            </div>
            <div class="input">
              <label for="office_address">Company address</label>
              <i class="fa-regular fa-map icon"></i>
              <input id="office_address" class="control" type="text" placeholder="Street, City (optional)" autocomplete="street-address" />
            </div>

            <div class="form-row two">
              <div class="input">
                <label for="country">Country</label>
                <i class="fa-regular fa-message icon"></i>
                <select id="country" class="control">
                  <option value="" selected disabled>Select…</option>
                  <?php
                    require_once __DIR__ . '/connection/connection.php';
                    $rs_countries = Database::search("SELECT country_id, country FROM country ORDER BY country ASC");
                    if ($rs_countries) {
                      while ($row = $rs_countries->fetch_assoc()) {
                        $id = htmlspecialchars($row['country_id'], ENT_QUOTES, 'UTF-8');
                        $label = htmlspecialchars($row['country'], ENT_QUOTES, 'UTF-8');
                        echo "<option value=\"$id\">$label</option>";
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="input">
                <label for="city">City</label>
                <i class="fa-regular fa-city icon"></i>
                <input id="city" class="control" type="text" placeholder="Colombo" autocomplete="address-level2" />
              </div>
            </div>

            <div class="form-row two">
              <div class="input">
                <label for="postal_code">Postal code</label>
                <i class="fa-regular fa-envelope-open icon"></i>
                <input id="postal_code" class="control" type="text" placeholder="00100" autocomplete="postal-code" />
              </div>
              <div class="input">
                <label for="industry">Industry</label>
                <i class="fa-solid fa-industry icon"></i>
                <input id="industry" class="control" type="text" placeholder="e.g. Fintech" />
              </div>
            </div>

            <!-- Project & Tax -->
            <div class="form-row two">
              <div class="input">
                <label for="associated_project">project name</label>
                <i class="fa-solid fa-diagram-project icon"></i>
                <input id="associated_project" class="control" type="text" placeholder="Project name" />
              </div>

              
              
            </div>
            <div class="input">
              <label for="request_documentation">Project description</label>
              <textarea id="request_documentation" class="control" rows="3" placeholder="Project description"></textarea>
            </div>
           

            <div class="form-row two">
              <div class="input">
                <label for="currency">Currency</label>
                <i class="fa-regular fa-money-bill-1 icon"></i>
                <select id="currency" class="control">
                  <option value="" selected disabled>Select…</option>
                  <?php
                    require_once __DIR__ . '/connection/connection.php';
                    $rs_currency = Database::search("SELECT currency_id, currency FROM currency ORDER BY currency ASC");
                    if ($rs_currency) {
                      while ($row = $rs_currency->fetch_assoc()) {
                        $id = htmlspecialchars($row['currency_id'], ENT_QUOTES, 'UTF-8');
                        $label = htmlspecialchars($row['currency'], ENT_QUOTES, 'UTF-8');
                        echo "<option value=\"$id\">$label</option>";
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="input">
                <label for="payment_method">Payment method</label>
                <i class="fa-regular fa-credit-card icon"></i>
                <select id="payment_method" class="control">
                  <option value="" selected disabled>Select…</option>
                  <?php
                    require_once __DIR__ . '/connection/connection.php';
                    $rs_pm = Database::search("SELECT payment_id, payment_method FROM payment_method ORDER BY payment_method ASC");
                    if ($rs_pm) {
                      while ($row = $rs_pm->fetch_assoc()) {
                        $id = htmlspecialchars($row['payment_id'], ENT_QUOTES, 'UTF-8');
                        $label = htmlspecialchars($row['payment_method'], ENT_QUOTES, 'UTF-8');
                        echo "<option value=\"$id\">$label</option>";
                      }
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="form-row two">
              <div class="input">
                <label for="priority_level">Priority level</label>
                <i class="fa-regular fa-star icon"></i>
                <select id="priority_level" class="control">
                  <option value="" selected disabled>Select…</option>
                  <?php
                    require_once __DIR__ . '/connection/connection.php';
                    $rs_pl = Database::search("SELECT priority_level_id, priority_level FROM priority_level ORDER BY priority_level ASC");
                    if ($rs_pl) {
                      while ($row = $rs_pl->fetch_assoc()) {
                        $id = htmlspecialchars($row['priority_level_id'], ENT_QUOTES, 'UTF-8');
                        $label = htmlspecialchars($row['priority_level'], ENT_QUOTES, 'UTF-8');
                        echo "<option value=\"$id\">$label</option>";
                      }
                    }
                  ?>
                </select>
              </div>
             
            </div>

            <!-- Documents & Requests -->
           

          

            <div class="form-row two">
              <div class="input">
                <label for="special_request">Special request</label>
                <i class="fa-regular fa-bell icon"></i>
                <textarea id="special_request" class="control" rows="3" placeholder="Any special notes"></textarea>
              </div>
              
            </div>

            <!-- Security -->
            <div class="form-row two">
              <div class="input">
                <label for="signup-password">Password</label>
                <i class="fa-solid fa-lock icon"></i>
                <input id="signup-password" class="control" type="password" placeholder="Create a password" autocomplete="new-password" required />
                <button type="button" class="toggle-password" aria-label="Show password" data-target="signup-password">
                  <i class="fa-regular fa-eye"></i>
                </button>
              </div>
              <div class="input">
                <label for="signup-confirm">Confirm password</label>
                <i class="fa-solid fa-lock icon"></i>
                <input id="signup-confirm" class="control" type="password" placeholder="Repeat password" autocomplete="new-password" required />
                <button type="button" class="toggle-password" aria-label="Show password" data-target="signup-confirm">
                  <i class="fa-regular fa-eye"></i>
                </button>
              </div>
            </div>

            <label class="checkbox" style="margin-top:6px;">
              <input type="checkbox" id="terms" required />
              I agree to the Terms & Conditions
            </label>

            <button class="btn" type="submit" style="margin-top:8px;">
              <i class="fa-solid fa-user-plus" style="margin-right:10px;"></i>
              Create Account
            </button>

            <div class="note">Already have an account? Switch to <a href="#" class="link">Sign In</a>.</div>
          </form>
          </section>
        </div>

        <div class="mini"> SoftCode Pro</div>
      </div>

  </main>

  <!-- Dynamic dropdown loader -->
  <script src="api/ajax.js"></script>

  <script>
    // Accessibility helpers for tabs
    const tabsRoot = document.getElementById('tabs');
    const tabSignin = document.getElementById('tab-signin');
    const tabSignup = document.getElementById('tab-signup');
    const panelSignin = document.getElementById('panel-signin');
    const panelSignup = document.getElementById('panel-signup');

    function activate(which){
      const isSignup = which === 'signup';

      // Visual state
      tabsRoot.classList.toggle('signup', isSignup);
      tabSignin.classList.toggle('active', !isSignup);
      tabSignup.classList.toggle('active', isSignup);

      // ARIA state
      tabSignin.setAttribute('aria-selected', String(!isSignup));
      tabSignup.setAttribute('aria-selected', String(isSignup));
      tabSignin.setAttribute('tabindex', !isSignup ? '0' : '-1');
      tabSignup.setAttribute('tabindex', isSignup ? '0' : '-1');

      // Panels
      panelSignin.classList.toggle('active', !isSignup);
      panelSignup.classList.toggle('active', isSignup);
      panelSignin.hidden = isSignup;
      panelSignup.hidden = !isSignup;

      // Persist selection
      try { localStorage.setItem('auth_tab', which); } catch(e){}
    }

    tabSignin.addEventListener('click', () => activate('signin'));
    tabSignup.addEventListener('click', () => activate('signup'));

    // Make note links switch tabs
    document.addEventListener('click', (e) => {
      const a = e.target.closest('.note a.link');
      if (!a) return;
      e.preventDefault();
      const text = a.textContent.toLowerCase();
      if (text.includes('sign up')) activate('signup');
      if (text.includes('sign in')) activate('signin');
    });

    // Keyboard toggle for tabs
    tabsRoot.addEventListener('keydown', (e) => {
      const key = e.key;
      if (key === 'ArrowRight' || key === 'ArrowLeft'){
        const current = tabSignup.classList.contains('active') ? 'signup' : 'signin';
        activate(current === 'signin' ? 'signup' : 'signin');
        e.preventDefault();
      }
      if (key === 'Home'){ activate('signin'); e.preventDefault(); }
      if (key === 'End'){ activate('signup'); e.preventDefault(); }
    });

    // Restore last selected tab
    (function(){
      let last = 'signin';
      try { last = localStorage.getItem('auth_tab') || 'signin'; } catch(e){}
      activate(last);
    })();

    // Prefill Remember Me values
    (function(){
      try {
        const remembered = localStorage.getItem('scp_remember') === '1';
        const rememberedEmail = localStorage.getItem('scp_email') || '';
        const chk = document.getElementById('remember');
        const emailInput = document.getElementById('signin-email');
        if (chk) chk.checked = remembered;
        if (remembered && emailInput) emailInput.value = rememberedEmail;
      } catch(e){}
    })();

    // Password show/hide
    document.querySelectorAll('.toggle-password').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-target');
        const input = document.getElementById(id);
        const icon = btn.querySelector('i');
        if (!input) return;
        const to = input.type === 'password' ? 'text' : 'password';
        input.type = to;
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
        btn.setAttribute('aria-label', to === 'password' ? 'Show password' : 'Hide password');
      });
    });

    // Handle form submissions
    document.getElementById('form-signin').addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const email = document.getElementById('signin-email').value;
      const password = document.getElementById('signin-password').value;
      const remember = document.getElementById('remember')?.checked;
      
      try {
        const response = await fetch('/scpcode/api/loginProcess.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            action: 'signin',
            email: email,
            password: password
          })
        });
        // Read as text first to avoid JSON parse crash on HTML errors
        const text = await response.text();
        let data;
        try { data = JSON.parse(text); } catch(parseErr){
          console.error('Non-JSON response from signin API:', text);
          alert('Server response was not JSON. Details (first 300 chars):\n' + text.slice(0,300));
          return;
        }
        
        if (data.ok) {
          // Save Remember Me state
          try {
            if (remember) {
              localStorage.setItem('scp_remember', '1');
              localStorage.setItem('scp_email', email);
            } else {
              localStorage.removeItem('scp_remember');
              localStorage.removeItem('scp_email');
            }
            // Store basic user info for the portal if needed
            localStorage.setItem('scp_client', JSON.stringify(data.user));
          } catch(e){}

          alert('Login successful! Welcome ' + data.user.name);
          // Redirect to client portal
          window.location.href = '/scpcode/postal/postal.php';
        } else {
          alert('Login failed: ' + data.error);
        }
      } catch (error) {
        alert('Network error: ' + error.message);
      }
    });
    
    document.getElementById('form-signup').addEventListener('submit', async (e) => {
      e.preventDefault();
      
      // Collect all form data
      const formData = {
        action: 'signup',
        client_name: document.getElementById('client_name').value,
        company_name: document.getElementById('company_name').value,
        email: document.getElementById('signup-email').value,
        phone_number: document.getElementById('phone_number').value,
        whatsapp_number: document.getElementById('whatsapp_number').value,
        billing_address: document.getElementById('billing_address').value,
        office_address: document.getElementById('office_address').value,
        city: document.getElementById('city').value,
        postal_code: document.getElementById('postal_code').value,
        industry: document.getElementById('industry').value,
        assigned_account_manager: document.getElementById('assigned_account_manager').value,
        associated_project: document.getElementById('associated_project').value,
        request_documentation: document.getElementById('request_documentation').value,
        special_request: document.getElementById('special_request').value,
        preferred_communication: document.getElementById('preferred_communication').value,
        country: document.getElementById('country').value,
        currency: document.getElementById('currency').value,
        payment_method: document.getElementById('payment_method').value,
        priority_level: document.getElementById('priority_level').value,
        password: document.getElementById('signup-password').value
      };
      
      // Validate password confirmation
      const confirmPassword = document.getElementById('signup-confirm').value;
      if (formData.password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
      }
      
      // Check terms acceptance
      if (!document.getElementById('terms').checked) {
        alert('Please accept the Terms & Conditions');
        return;
      }
      
      try {
        const response = await fetch('/scpcode/api/loginProcess.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(formData)
        });
        // Read as text first to avoid JSON parse crash on HTML errors
        const text = await response.text();
        let data;
        try { data = JSON.parse(text); } catch(parseErr){
          console.error('Non-JSON response from signup API:', text);
          alert('Server response was not JSON. Details (first 300 chars):\n' + text.slice(0,300));
          return;
        }
        
        if (data.ok) {
          try {
            localStorage.setItem('scp_client', JSON.stringify(data.user));
          } catch(e){}
          alert('Registration successful! Welcome ' + data.user.name);
          // Redirect to client portal after signup
          window.location.href = '/scpcode/postal/postal.php';
        } else {
          alert('Registration failed: ' + data.error);
        }
      } catch (error) {
        alert('Network error: ' + error.message);
      }
    });
  </script>
</body>
</html>