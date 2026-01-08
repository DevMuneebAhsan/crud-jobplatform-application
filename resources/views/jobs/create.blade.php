<x-layout>
    <x-page-heading>Post A Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="Video Editer , Web developer.." />
        <x-forms.input label="Salary" name="salary" placeholder="$50,000" />
        <x-forms.input label="Location" name="location" placeholder="Lahore, Pakistan" />
        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>
        <x-forms.input label="URL" name="url" placeholder="http://www.linkedin.com/software-engineer" />
        <x-forms.checkbox label="Featured (Costs You Extra)" name="feature" />
        <x-forms.divider />
        <x-forms.input label="Tags[optional(Comma Separated)]" name="tags" placeholder="video-editor,editing" />
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>

</x-layout>