"use strict";function Ingresar(){fetch("apps/jci/auth/verify-usr/verify-usr.model.php",{method:"POST"}).then((e=>e.json())).then((e=>{"verifyok"==e.resultado?location.reload():location.href="./?app=jci"}))}