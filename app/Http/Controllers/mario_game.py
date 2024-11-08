import pygame
import random

# Initialize Pygame
pygame.init()

# Screen settings
SCREEN_WIDTH = 800
SCREEN_HEIGHT = 600
screen = pygame.display.set_mode((SCREEN_WIDTH, SCREEN_HEIGHT))
pygame.display.set_caption("Super Mario Clone")

# Colors
WHITE = (255, 255, 255)
BLACK = (0, 0, 0)
BLUE = (0, 0, 255)

# Game variables
GRAVITY = 0.8
PLAYER_SPEED = 5
JUMP_STRENGTH = -15

# Load player image
player_img = pygame.image.load("mario.png")
player_img = pygame.transform.scale(player_img, (40, 60))  # Resize image

# Player class
class Player(pygame.sprite.Sprite):
    def __init__(self):
        super().__init__()
        self.image = player_img
        self.rect = self.image.get_rect()
        self.rect.center = (100, SCREEN_HEIGHT - 100)
        self.vel_y = 0
        self.jumping = False

    def update(self, keys):
        # Horizontal movement
        if keys[pygame.K_LEFT]:
            self.rect.x -= PLAYER_SPEED
        if keys[pygame.K_RIGHT]:
            self.rect.x += PLAYER_SPEED

        # Apply gravity
        self.vel_y += GRAVITY
        self.rect.y += self.vel_y

        # Prevent falling through the floor
        if self.rect.bottom >= SCREEN_HEIGHT:
            self.rect.bottom = SCREEN_HEIGHT
            self.vel_y = 0
            self.jumping = False

    def jump(self):
        if not self.jumping:
            self.vel_y = JUMP_STRENGTH
            self.jumping = True

# Platform class
class Platform(pygame.sprite.Sprite):
    def __init__(self, x, y, width, height):
        super().__init__()
        self.image = pygame.Surface((width, height))
        self.image.fill(BLUE)
        self.rect = self.image.get_rect()
        self.rect.topleft = (x, y)

# Create a player instance
player = Player()

# Create platforms
platforms = pygame.sprite.Group()
for i in range(5):
    platform = Platform(random.randint(0, SCREEN_WIDTH - 100),
                        random.randint(100, SCREEN_HEIGHT - 50), 100, 10)
    platforms.add(platform)

# Game loop variables
clock = pygame.time.Clock()
running = True

# Main game loop
while running:
    screen.fill(WHITE)

    # Event handling
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False

    # Player input
    keys = pygame.key.get_pressed()
    if keys[pygame.K_SPACE]:
        player.jump()

    # Update player and draw everything
    player.update(keys)
    screen.blit(player.image, player.rect)

    # Draw platforms
    for platform in platforms:
        screen.blit(platform.image, platform.rect)

    # Collision detection (player and platforms)
    if pygame.sprite.spritecollide(player, platforms, False):
        player.vel_y = 0
        player.jumping = False

    pygame.display.update()
    clock.tick(60)

pygame.quit()
