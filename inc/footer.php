<footer>
	<p class="text-center mb-0">© 2026 Umesh Shakya — Frontend Designer</p>
</footer>
</div>
<!-- smooth-content -->
</div>
<!-- smooth-wrapper -->
<div class="topTop">
	<img class="svg" src="dist/img/icons/icon-up.svg" alt="Scroll to Top">
</div>
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/aos.min.js"></script>
<!-- GSAP core -->
<script src="dist/js/gsap.min.js"></script>

<!-- ScrollTrigger (required by ScrollSmoother) -->
<script src="dist/js/ScrollTrigger.min.js"></script>

<!-- ScrollSmoother plugin -->
<script src="dist/js/ScrollSmoother.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/SplitText.min.js"></script>
<script src="https://assets.codepen.io/16327/Flip.min.js"></script>
<script src="dist/js/custom.js"></script>

<script>
	let split, animation;

	function setup() {
		split && split.revert();
		animation && animation.revert();
		split = SplitText.create(".text", { type: "chars" });

// Animate on scroll
		gsap.from(split.chars, {
			scrollTrigger: {
		trigger: ".text", // element to trigger animation
		start: "top 80%", // when top of element hits 80% of viewport
		},
		x: 150,
		opacity: 0,
		duration: 0.5,
		ease: "power4.out",
		stagger: 0.04
		});
	}

// Initialize animation
	setup();

// Recalculate on window resize
	window.addEventListener("resize", setup);
</script>

<script>
	gsap.registerPlugin(SplitText, ScrollTrigger);

console.clear();

gsap.set(".split", { opacity: 1 });

document.fonts.ready.then(() => {
  let containers = gsap.utils.toArray(".custom-container");

  containers.forEach((container) => {
    let text = container.querySelector(".split");
    let animation;

    SplitText.create(text, {
      type: "words,lines",
      mask: "lines",
      linesClass: "line",
      autoSplit: true,
      onSplit: (instance) => {
        console.log("split")
        return gsap.from(instance.lines, {
          yPercent: 120,
          stagger: 0.1,
          scrollTrigger: {
            trigger: container,
            // markers: true,
            scrub: true,
            start: "clamp(top center)",
            end: "clamp(bottom center)"
          }
        });
      }
    });
  });
});
</script>

<script>

gsap.registerPlugin(Flip);

const container = document.querySelector(".custom-border");
const cards = gsap.utils.toArray("img", container);
const nextBtn = document.getElementById("next");
const prevBtn = document.getElementById("prev");
let isAnimating = false;

nextBtn.addEventListener("click", () => {
  if (isAnimating) return;
  isAnimating = true;
  updateCaterpillar(true);
});
prevBtn.addEventListener("click", () => {
  if (isAnimating) return;
  isAnimating = true;
  updateCaterpillar(false);
});

const updateCaterpillar = (forward) => {
  const cards = gsap.utils.toArray("img", container);
  const first = cards[0];
  const last = cards[cards.length - 1];
  const state = Flip.getState(cards);
  let newCard = document.createElement("img");
  gsap.set(newCard, { scale: 0, opacity: 0 });

  if (forward) {
    newCard.src = first.src;
    container.append(newCard);
    first.classList.add("hide");
  } else {
    newCard.src = last.src;
    newCard.innerText = last.innerText;
    container.prepend(newCard);
    last.classList.add("hide");
  }
  Flip.from(state, {
    targets: "img",
    fade: true,
    absoluteOnLeave: true,
    onEnter: (els) => {
      gsap.to(els, {
        opacity: 1,
        scale: 1,
        transformOrigin: forward ? "bottom right" : "bottom left"
      });
    },
    onLeave: (els) => {
      gsap.to(els, {
        opacity: 0,
        scale: 0,
        transformOrigin: forward ? "bottom left" : "bottom right",
        onComplete: () => {
          els[0].remove();
          isAnimating = false;
        }
      });
    }
  });
};

</script>

</body>

</html>
