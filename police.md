# 📱 Guide des tailles de police responsive

## Système de tailles Tailwind CSS utilisé

### **Titres principaux (H1)**
```css
/* Hero sections - Très grands titres */
text-4xl md:text-5xl lg:text-6xl
/* Mobile: 36px | Tablet: 48px | Desktop: 60px */

/* Pages intérieures */
text-4xl md:text-5xl
/* Mobile: 36px | Tablet: 48px */
```

### **Sous-titres (H2)**
```css
/* Sections principales */
text-3xl md:text-4xl
/* Mobile: 30px | Tablet: 36px */

/* Titres de cartes */
text-3xl
/* Toutes tailles: 30px */
```

### **Titres secondaires (H3)**
```css
/* Composants importants */
text-2xl
/* Toutes tailles: 24px */

/* Cartes et éléments */
text-xl
/* Toutes tailles: 20px */
```

### **Texte de contenu**
```css
/* Paragraphes principaux */
text-lg
/* Toutes tailles: 18px */

/* Hero descriptions */
text-xl md:text-2xl
/* Mobile: 20px | Tablet: 24px */

/* Texte standard */
text-base
/* Toutes tailles: 16px (par défaut) */

/* Texte secondaire */
text-sm
/* Toutes tailles: 14px */

/* Petites annotations */
text-xs
/* Toutes tailles: 12px */
```

### **Navigation**
```css
/* Logo */
text-xl
/* Toutes tailles: 20px */

/* Liens de navigation */
text-base
/* Toutes tailles: 16px */
```

### **Boutons**
```css
/* Boutons principaux */
text-base font-semibold
/* Toutes tailles: 16px, gras */

/* Boutons secondaires */
text-sm font-medium
/* Toutes tailles: 14px, medium */
```

### **Formulaires**
```css
/* Labels */
text-sm font-medium
/* Toutes tailles: 14px, medium */

/* Inputs et selects */
text-base
/* Toutes tailles: 16px */
```

### **Éléments spéciaux**
```css
/* Prix et tarifs */
text-lg font-semibold
text-xl font-bold
/* 18px ou 20px, gras */

/* Statistiques */
text-3xl font-bold
/* Toutes tailles: 30px, gras */

/* Footer */
text-lg font-semibold  /* Titres sections: 18px */
text-sm               /* Liens: 14px */
```

## 🎯 Breakpoints Tailwind utilisés

```css
/* Mobile first (par défaut) */
/* 0px - 767px */

md:  /* Tablet */
/* 768px et plus */

lg:  /* Desktop */
/* 1024px et plus */

xl:  /* Large desktop */
/* 1280px et plus (peu utilisé dans ce projet) */
```

## 📏 Correspondance px des classes Tailwind

```css
text-xs    = 12px
text-sm    = 14px
text-base  = 16px
text-lg    = 18px
text-xl    = 20px
text-2xl   = 24px
text-3xl   = 30px
text-4xl   = 36px
text-5xl   = 48px
text-6xl   = 60px
```

## 🎨 Poids de police utilisés

```css
font-normal    = 400
font-medium    = 500
font-semibold  = 600
font-bold      = 700
```

## 📱 Exemples d'utilisation responsive

### Hero principal
```jsx
<h1 className="text-4xl md:text-5xl lg:text-6xl font-serif font-bold">
  Titre principal
</h1>
<p className="text-xl md:text-2xl">
  Description du hero
</p>
```

### Section standard
```jsx
<h2 className="text-3xl md:text-4xl font-serif font-bold">
  Titre de section
</h2>
<p className="text-lg">
  Contenu de la section
</p>
```

### Carte de service
```jsx
<h3 className="text-xl font-serif font-semibold">
  Nom du service
</h3>
<p className="text-base">
  Description du service
</p>
<span className="text-sm text-neutral-500">
  Informations complémentaires
</span>
```

## 🔧 Bonnes pratiques appliquées

1. **Mobile First** : Tailles de base pour mobile, augmentation pour desktop
2. **Hiérarchie claire** : Différence significative entre les niveaux
3. **Lisibilité** : Minimum 16px pour le texte de contenu
4. **Cohérence** : Même classe pour même fonction
5. **Performance** : Utilisation des classes Tailwind natives

## 🎯 Recommandations d'usage

- **H1** : `text-4xl md:text-5xl` minimum
- **H2** : `text-3xl md:text-4xl` pour sections importantes
- **H3** : `text-2xl` ou `text-xl` selon l'importance
- **Contenu** : `text-lg` pour importance, `text-base` standard
- **UI** : `text-sm` pour labels, `text-xs` pour annotations