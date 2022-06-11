
export default function useFormater() {

    const generateSlug = (name) => {
        return name.toLowerCase()
         .trim()
         .replace(/[^\w\s-]/g, '')
         .replace(/[\s_-]+/g, '-')
         .replace(/^-+|-+$/g, '');
     }
    return {
        generateSlug
    }
}