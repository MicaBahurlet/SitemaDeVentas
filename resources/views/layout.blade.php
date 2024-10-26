<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="MICAELA BAHURLET" />
    <title>STOCK MASTER | Primeros pasos</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/steps.css') }}">
  </head>
  <body id="page-top">
    <!-- Navigation-->
    <nav
      class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm"
      id="mainNav"
    >
      <div class="container px-5">
        <a class="navbar-brand fw-bol" style="font-weight: 800" href="#page-top"
          >STOCK MASTER</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menu
          <i class="bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
          <li class="nav-item">
              <a class="nav-link me-lg-3" href="{{ route('login') }}"
                >Iniciar sesión</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link me-lg-3" href="#features">Características</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-lg-3" href="#primerosPasos"
                >Primeros Pasos</a
              >
            </li>
          </ul>
          <button
            class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0"
            data-bs-toggle="modal"
            data-bs-target="#feedbackModal"
          >
            <span class="d-flex align-items-center">
              <i class="bi-chat-text-fill me-2"></i>
              <span class="small">Contacto</span>
            </span>
          </button>

        </div>
      </div>
    </nav>
    <!-- Mashead header-->
    <header class="masthead">
      <div class="container px-5">
        <div class="row gx-5 align-items-center">
          <div class="col-lg-6">
            <!-- Mashead text and app badges-->
            <div class="mb-5 mb-lg-0 text-center text-lg-start">
              <h1 class="display-1 lh-1 mb-3">GESTIONA TU NEGOCIO.</h1>
              <p class="lead fw-normal text-muted mb-5">
                Software de trakeo de productos, control de ventas y ventas.
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <!-- Masthead device mockup feature-->
            <div class="masthead-device-mockup">
              <svg
                class="circle"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg"
              >
                <defs>
                  <linearGradient
                    id="circleGradient"
                    gradientTransform="rotate(45)"
                  >
                    <stop offset="0%" stop-color="#004f73"></stop>
                    <stop offset="100%" stop-color="#007BA7"></stop>
                  </linearGradient>
                </defs>
                <circle
                  cx="50"
                  cy="50"
                  r="50"
                  fill="url(#circleGradient)"
                ></circle>
              </svg>
              ><svg
                class="shape-1 d-none d-sm-block"
                viewBox="0 0 240.83 240.83"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect
                  x="-32.54"
                  y="78.39"
                  width="305.92"
                  height="84.05"
                  rx="42.03"
                  transform="translate(120.42 -49.88) rotate(45)"
                ></rect>
                <rect
                  x="-32.54"
                  y="78.39"
                  width="305.92"
                  height="84.05"
                  rx="42.03"
                  transform="translate(-49.88 120.42) rotate(-45)"
                ></rect></svg
              ><svg
                class="shape-2 d-none d-sm-block"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="50" cy="50" r="50"></circle>
              </svg>
              <div class="device-wrapper">
                <div
                  class="device"
                  data-device="iPhoneX"
                  data-orientation="portrait"
                  data-color="black"
                >
                  <div class="screen">
                    <img
                      src="./img/ScreenPrincipal.png"
                      alt="Contenido de la pantalla"
                      style="width: 100%; height: 100%"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Quote/testimonial aside-->
    <aside class="text-center bg-gradient-primary-to-secondary">
      <div class="container px-5">
        <div class="row gx-5 justify-content-center">
          <div class="col-xl-8">
            <div class="h2 fs-1 text-white mb-4">
              Simple, Agil y eficiente. Controlá tu negocio desde cualquier
              lugar.
            </div>
            <!-- <h2>STOCK MASTER</h2> -->
          </div>
        </div>
      </div>
    </aside>
    <!-- App features section-->
    <section id="features">
      <div class="container px-5">
        <div class="row gx-5 align-items-center">
          <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
            <div class="container-fluid px-5">
              <div class="row gx-5">
                <div class="col-md-6 mb-5">
                  <!-- Feature item-->
                  <div class="text-center">
                    <i
                      class="bi-phone icon-feature text-gradient d-block mb-3"
                    ></i>
                    <h3 class="font-alt">Versión Mobile</h3>
                    <p class="text-muted mb-0">
                      Llevá tu negocio siempre con vos y administralo desde
                      cualquier lugar
                    </p>
                  </div>
                </div>
                <div class="col-md-6 mb-5">
                  <!-- Feature item-->
                  <div class="text-center">
                    <i
                      class="bi-people icon-feature text-gradient d-block mb-3"
                    ></i>
                    <h3 class="font-alt">Clientes y Proveedores</h3>
                    <p class="text-muted mb-0">
                      En tu gestor contas con la <br />
                      información de tallada de quién te compra y quién te
                      abastece
                    </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                  <!-- Feature item-->
                  <div class="text-center">
                    <i
                      class="bi-cash-coin icon-feature text-gradient d-block mb-3"
                    ></i>
                    <h3 class="font-alt">Ventas</h3>
                    <p class="text-muted mb-0">
                      Llevá el control de tus ventas con los detalles de cada
                      transacción
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Feature item-->
                  <div class="text-center">
                    <i
                      class="bi-cart3 icon-feature text-gradient d-block mb-3"
                    ></i>
                    <h3 class="font-alt">Productos</h3>
                    <p class="text-muted mb-0">
                      Stokea tus productos llevando los datos de cada uno,
                      imágenes, fechas, categorias,etc.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 order-lg-0">
            <!-- Features section device mockup-->
            <div class="features-device-mockup">
              <svg
                class="circle"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg"
              >
                <defs>
                  <linearGradient
                    id="circleGradient"
                    gradientTransform="rotate(45)"
                  >
                    <stop class="gradient-start-color" offset="0%"></stop>
                    <stop class="gradient-end-color" offset="100%"></stop>
                  </linearGradient>
                </defs>
                <circle cx="50" cy="50" r="50"></circle></svg
              ><svg
                class="shape-1 d-none d-sm-block"
                viewBox="0 0 240.83 240.83"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect
                  x="-32.54"
                  y="78.39"
                  width="305.92"
                  height="84.05"
                  rx="42.03"
                  transform="translate(120.42 -49.88) rotate(45)"
                ></rect>
                <rect
                  x="-32.54"
                  y="78.39"
                  width="305.92"
                  height="84.05"
                  rx="42.03"
                  transform="translate(-49.88 120.42) rotate(-45)"
                ></rect></svg
              ><svg
                class="shape-2 d-none d-sm-block"
                viewBox="0 0 100 100"
                xmlns="http://www.w3.org/2000/svg"
              >
                <circle cx="50" cy="50" r="50"></circle>
              </svg>
              <div class="device-wrapper">
                <div
                  class="device"
                  data-device="iPhoneX"
                  data-orientation="portrait"
                  data-color="black"
                >
                  <div class="screen bg-black">
                    <!-- PUT CONTENTS HERE:-->
                    <!-- * * This can be a video, image, or just about anything else.-->
                    <!-- * * Set the max width of your media to 100% and the height to-->
                    <!-- * * 100% like the demo example below.-->
                    <img src="./img/Beneficios.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Basic features section-->
    <section class="bg-light">
      <div class="container px-5">
        <div
          class="row gx-5 align-items-center justify-content-center justify-content-lg-between"
        >
          <div class="col-12 col-lg-5">
            <h2 class="display-4 lh-1 mb-4">
              El software que tu negocio estaba necesitando.
            </h2>
            <p class="lead fw-normal text-muted mb-5 mb-lg-0">
              Si tenes un negocio que se encarga de vender productos físicos es
              necesario llevar un control de tu mercadería, pero también de tus
              proveedores y clientes.
            </p>
          </div>
          <div class="col-sm-8 col-md-6">
            <div class="px-5 px-sm-0">
              <img
                class="img-fluid rounded-circle"
                src="./img/3.jpg"
                alt="..."
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <aside class=" bg-gradient-primary-to-secondary" id="primerosPasos">
        <div class="container px-5">
          <div class="row gx-5 justify-content-center">
            <div class="col-xl-8">
              <div class="h2 fs-1 text-white mb-4">
                Primeros Pasos
              </div>
              <div class="text-white lista-pasos" >
                <ul class="lista-grande">
                    <li>Contactate con nuetro equipo</li>
                    <li>Recibí un instructivo de como utilizar nuestra aplicación</li>
                    <li>Establece desde tu cuenta de administrador roles, en caso de que tengas empleados/as y asigná permisos para mantener la seguridad de tu negocio</li>
                    <li>Carga tus categorías y marcas</li>
                    <li>Traquea tus productos</li>
                    <li>Carga tus clientes con sus datos más relevantes</li>
                    <li>Carga tus proveedores</li>
                    <li>Comenzá a registrar tus compras y ventas</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </aside>

    <!-- Call to action section-->
    <section class="cta">
      <div class="cta-content">
        <div class="container px-5">
          <h2 class="text-white display-1 lh-1 mb-4">
            Comenzá ahora.
            <br />
            Gestioná ya.
          </h2>
          <a
            class="btn btn-outline-light py-3 px-4 rounded-pill"
            href="#"
            target="_blank"
            >Contactate</a
          >
        </div>
      </div>
    </section>



    <!-- Footer-->
    <footer class="bg-black text-center py-5">
      <div class="container px-5">
        <div class="text-white-50 small">
          <div class="mb-2">
            &copy; STOCK MASTER 2024, todos los derechos reservados.
          </div>
          <!-- <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a> -->
        </div>
      </div>
    </footer>
    <!-- Feedback Modal-->
    <div
      class="modal fade"
      id="feedbackModal"
      tabindex="-1"
      aria-labelledby="feedbackModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-gradient-primary-to-secondary p-4">
            <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">
              Send feedback
            </h5>
            <button
              class="btn-close btn-close-white"
              type="button"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body border-0 p-4">
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
              <!-- Name input-->
              <div class="form-floating mb-3">
                <input
                  class="form-control"
                  id="name"
                  type="text"
                  placeholder="Enter your name..."
                  data-sb-validations="required"
                />
                <label for="name">Full name</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">
                  A name is required.
                </div>
              </div>
              <!-- Email address input-->
              <div class="form-floating mb-3">
                <input
                  class="form-control"
                  id="email"
                  type="email"
                  placeholder="name@example.com"
                  data-sb-validations="required,email"
                />
                <label for="email">Email address</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">
                  An email is required.
                </div>
                <div class="invalid-feedback" data-sb-feedback="email:email">
                  Email is not valid.
                </div>
              </div>
              <!-- Phone number input-->
              <div class="form-floating mb-3">
                <input
                  class="form-control"
                  id="phone"
                  type="tel"
                  placeholder="(123) 456-7890"
                  data-sb-validations="required"
                />
                <label for="phone">Phone number</label>
                <div class="invalid-feedback" data-sb-feedback="phone:required">
                  A phone number is required.
                </div>
              </div>
              <!-- Message input-->
              <div class="form-floating mb-3">
                <textarea
                  class="form-control"
                  id="message"
                  type="text"
                  placeholder="Enter your message here..."
                  style="height: 10rem"
                  data-sb-validations="required"
                ></textarea>
                <label for="message">Message</label>
                <div
                  class="invalid-feedback"
                  data-sb-feedback="message:required"
                >
                  A message is required.
                </div>
              </div>
              <!-- Submit success message-->
              <!---->
              <!-- This is what your users will see when the form-->
              <!-- has successfully submitted-->
              <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                  <div class="fw-bolder">Form submission successful!</div>
                  To activate this form, sign up at
                  <br />
                  <a href="https://startbootstrap.com/solution/contact-forms"
                    >https://startbootstrap.com/solution/contact-forms</a
                  >
                </div>
              </div>
              <!-- Submit error message-->
              <!---->
              <!-- This is what your users will see when there is-->
              <!-- an error submitting the form-->
              <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">
                  Error sending message!
                </div>
              </div>
              <!-- Submit Button-->
              <div class="d-grid">
                <button
                  class="btn btn-primary rounded-pill btn-lg disabled"
                  id="submitButton"
                  type="submit"
                >
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/steps.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
